<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ExperienceController extends Controller
{
    public function list_experience(Request $request)
    {
        $data = Experience::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("note", function($data) {
                $html = json_decode($data->note);

                return str_replace('\r\n','<br>',$html);
            })
            ->editColumn("action", function($data) {
                $urlEdit = route("show-experience", ["id" => $data->id]);
                $urlDelete = route("delete-experience", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editDataExperience(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteDataExperience(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action", "note"])
            ->make(true);
    }

    public function save_experience(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();
            }

            $set = [
                "id" => $id,
                "start" => $request->start,
                "until" => $request->until,
                "company" => $request->company,
                "job" => $request->job,
                "note" => json_encode($request->note),
            ];

            $detect = Experience::find($id);
            if (!$detect) {
                $detect = Experience::create($set);
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

    public function show_experience($id = null)
    {
        $data = Experience::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            $data->note = json_decode($data->note);
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

    public function delete_experience($id = null)
    {
        $data = Experience::find($id);
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
