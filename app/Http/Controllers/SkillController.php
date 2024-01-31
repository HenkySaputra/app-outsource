<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{
    public $backUrl = 'Skill';

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Skill::where('worker_id', $request->worker_id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="editSkill btn btn-icon btn-active-light-primary w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-pencil-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="deleteSkill btn btn-icon btn-active-light-danger w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-trash-fill fs-4"></i></span></a>';
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
            'name_skill' => 'required',
            'level_skill' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = new Skill();
        $data->worker_id = $request->worker_id;
        $data->name = $request->name_skill;
        $data->level = $request->level_skill;
        $data->save();

        return response()->json([
            'success' => $this->backUrl . ' Created',
        ]);
    }

    public function detail($id)
    {
        $data = Skill::findOrFail($id);
        return response()->json(['data' => $data, 'name' => 'skill']);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_skill' => 'required',
            'level_skill' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Skill::findOrFail($request->id);
        $data->worker_id = $request->worker_id;
        $data->name = $request->name_skill;
        $data->level = $request->level_skill;

        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    public function destroy(Request $request)
    {
        $data = Skill::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
