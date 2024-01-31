<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WorkerController extends Controller
{
    public $backUrl = 'Worker';

    public function index()
    {
        return view('umum.' . $this->backUrl . '.index', [
            'backUrl' => $this->backUrl,
        ]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Worker::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="/um/worker/detail/' . $row->id . '"  class="view btn btn-icon btn-active-light-warning w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-eye-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-icon btn-active-light-primary w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-pencil-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-icon btn-active-light-danger w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-trash-fill fs-4"></i></span></a>';
                    return $button;
                })->addColumn('date_created', function ($row) {
                    $date_created = date('d F Y', strtotime($row->created_at));
                    return $date_created;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = 'Worker';
        if ($data->save()) {
            $worker = new Worker();
            $worker->name = $request->name;
            $worker->phone = $request->phone;
            $worker->user_id = $data->id;
            $worker->save();
        }
        $dataRegis = $request->all();
        $dataRegis['created_at'] = date('d F Y H:i:s', strtotime($worker->created_at));

        return response()->json([
            'success' => $this->backUrl . ' Created',
            'dataRegis' => $dataRegis,
        ]);
    }

    public function detail($id)
    {
        $data = Worker::findOrFail($id);
        return view('umum.' . $this->backUrl . '.detail', [
            'backUrl' => $this->backUrl,
            'data' => $data,
            'years' => range(date("Y"), 1980),
        ]);
    }

    public function update(Request $request, User $User)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Worker::findOrFail($request->id);

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    public function destroy(Request $request)
    {
        $data = Worker::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
