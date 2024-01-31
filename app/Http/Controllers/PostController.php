<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public $backUrl = 'Post';

    public function index()
    {
        return view('umum.' . $this->backUrl . '.index', [
            'backUrl' => $this->backUrl,
        ]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-icon btn-active-light-primary w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-pencil-fill fs-4"></i></span></a>';
                    $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-icon btn-active-light-danger w-30px h-30px"><span class="svg-icon svg-icon-3"><i class="bi bi-trash-fill fs-4"></i></span></a>';
                    return $button;
                })->addColumn('date_created', function ($row) {
                    $date_created = date('d F Y', strtotime($row->created_at));
                    return $date_created;
                })->addColumn('status', function ($row) {
                    $status = $row->is_active ?  '<div class="badge badge-light-success fw-bolder">Active</div>' : '<div class="badge badge-light-danger fw-bolder">Inactive</div>';
                    return $status;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = new Post();
        $data->title = $request->title;
        $data->save();

        return response()->json([
            'success' => $this->backUrl . ' Created',
        ]);
    }

    public function detail($id)
    {
        $data = Post::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()
                ->json([
                    'error' => $validator->messages()
                ]);
        }

        $data = Post::findOrFail($request->id);

        $data->title = $request->title;
        $data->update();

        return response()->json([
            'success' => $this->backUrl . ' Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Post::findOrFail($request->id);

        if ($data->delete()) {
            return response()->json(['success' => $this->backUrl . ' deleted successfully'], 200);
        }
        return response()->json(['errors' => $this->backUrl . ' not found'], 404);
    }
}
