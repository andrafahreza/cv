<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class SkillsController extends Controller
{
    public function list_skills(Request $request)
    {
        $data = Skills::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("action", function($data) {
                $urlEdit = route("show-skills", ["id" => $data->id]);
                $urlDelete = route("delete-skills", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editDataSkills(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteDataSkills(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action"])
            ->make(true);
    }

    public function save_skills(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $validation = Validator::make($request->all(), [
                "percentage" => 'integer|max:100'
            ]);

            if ($validation->fails()) {
                throw new \Exception("Percentage must between 1 to 100");
            }

            if ($id == null) {
                $id = Uuid::uuid4()->getHex();
            }

            $set = [
                "id" => $id,
                "skill" => $request->skill,
                "percentage" => $request->percentage,
            ];

            $detect = Skills::find($id);
            if (!$detect) {
                $detect = Skills::create($set);
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

    public function show_skills($id = null)
    {
        $data = Skills::find($id);
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

    public function delete_skills($id = null)
    {
        $data = Skills::find($id);
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
