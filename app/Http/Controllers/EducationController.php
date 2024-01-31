<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    public $backUrl = 'Education';

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Education::where('worker_id', $request->worker_id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="viewEdu btn btn-icon btn-active-light-warning w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-eye-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="editEdu btn btn-icon btn-active-light-primary w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-pencil-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="deleteEdu btn btn-icon btn-active-light-danger w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-trash-fill fs-4"></i></span></a>';
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
            'worker_id' => 'required',
            'grade' => 'required',
            'school_name' => 'required',
            'year_start_education' => 'required',
            'year_end_education' => 'required|gte:year_start_education',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = new Education();
        $data->worker_id = $request->worker_id;
        $data->grade = $request->grade;
        $data->school_name = $request->school_name;
        $data->year_start = $request->year_start_education;
        $data->year_end = $request->year_end_education;
        $data->save();

        return response()->json([
            'success' => $this->backUrl . ' Created',
        ]);
    }

    public function detail($id)
    {
        $data = Education::findOrFail($id);
        return response()->json(['data' => $data, 'name' => 'education']);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'worker_id' => 'required',
            'grade' => 'required',
            'school_name' => 'required',
            'year_start_education' => 'required',
            'year_end_education' => 'required|gte:year_start_education',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Education::findOrFail($request->id);

        $data->worker_id = $request->worker_id;
        $data->grade = $request->grade;
        $data->school_name = $request->school_name;
        $data->year_start = $request->year_start_education;
        $data->year_end = $request->year_end_education;

        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    public function destroy(Request $request)
    {
        $data = Education::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
