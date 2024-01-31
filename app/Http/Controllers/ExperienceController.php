<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ExperienceController extends Controller
{
    public $backUrl = 'Experience';

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Experience::where('worker_id', $request->worker_id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="viewExp btn btn-icon btn-active-light-warning w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-eye-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="editExp btn btn-icon btn-active-light-primary w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-pencil-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="deleteExp btn btn-icon btn-active-light-danger w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-trash-fill fs-4"></i></span></a>';
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
            'position' => 'required',
            'company_name' => 'required',
            'year_start_experience' => 'required',
            'year_end_experience' => 'required|gte:year_start_experience',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = new Experience();
        $data->worker_id = $request->worker_id;
        $data->position = $request->position;
        $data->company_name = $request->company_name;
        $data->year_start = $request->year_start_experience;
        $data->year_end = $request->year_end_experience;
        $data->save();

        return response()->json([
            'success' => $this->backUrl . ' Created',
        ]);
    }

    public function detail($id)
    {
        $data = Experience::findOrFail($id);
        return response()->json(['data' => $data, 'name' => 'experience']);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'company_name' => 'required',
            'year_start_experience' => 'required',
            'year_end_experience' => 'required|gte:year_start_experience',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Experience::findOrFail($request->id);
        $data->worker_id = $request->worker_id;
        $data->position = $request->position;
        $data->company_name = $request->company_name;
        $data->year_start = $request->year_start_experience;
        $data->year_end = $request->year_end_experience;

        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    public function destroy(Request $request)
    {
        $data = Experience::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
