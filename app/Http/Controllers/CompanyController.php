<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industries;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public $backUrl = 'Company';

    public function index()
    {
        return view('umum.' . $this->backUrl . '.index', [
            'backUrl' => $this->backUrl,
            'industries' => Industries::all(),
        ]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="view btn btn-icon btn-active-light-warning w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-eye-fill fs-4"></i></span></a>';
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
            'employee_count' => 'required',
            'industry' => 'required',
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
        $data->role = 'Company';
        if ($data->save()) {
            $company = new Company();
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->description = $request->description;
            $company->employee_count = $request->employee_count;
            $company->industry_id = $request->industry;
            $company->user_id = $data->id;
            $company->save();
        }
        $dataRegis = $request->all();
        $dataRegis['industry'] = $company->industry->name;
        $dataRegis['created_at'] = date('d F Y H:i:s', strtotime($company->created_at));

        return response()->json([
            'success' => $this->backUrl . ' Created',
            'dataRegis' => $dataRegis,
        ]);
    }

    public function detail($id)
    {
        $data = Company::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, User $User)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'employee_count' => 'required',
            'industry' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Company::findOrFail($request->id);

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->employee_count = $request->employee_count;
        $data->industry_id = $request->industry;
        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    public function destroy(Request $request)
    {
        $data = Company::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
