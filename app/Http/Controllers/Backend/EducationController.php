<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    public function index()
    {
        return view('back.pages.education.index', [
            "page" => "education"
        ]);
    }

    public function list_education(Request $request)
    {
        $data = Education::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("action", function($data) {
                $urlEdit = route("show-education", ["id" => $data->id]);
                $urlDelete = route("delete-education", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editData(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteData(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action"])
            ->make(true);
    }

    public function save_education(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();
            }

            $set = [
                "id" => $id,
                "year" => $request->year,
                "study" => $request->study,
                "major" => $request->major,
                "note" => $request->note,
            ];

            $detect = Education::find($id);
            if (!$detect) {
                $detect = Education::create($set);
                if (!$detect->save()) {
                    throw new \Exception("Failed to save data");
                }

            } else {
                unset($set["id"]);
                if (!$detect->update($set)) {
                    throw new \Exception("Failed to update data");
                }
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Update data successfully"
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred in saving data: $message"
            ]);
        }
    }

    public function show_education($id = null)
    {
        $data = Education::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            return response()->json([
                'alert' => 1,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }

    public function delete_education($id = null)
    {
        $data = Education::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            if (!$data->delete()) {
                throw new \Exception("Failed to delete data");
            }

            return response()->json([
                'alert' => 1,
                'message' => "Delete data successfully"
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }


}
