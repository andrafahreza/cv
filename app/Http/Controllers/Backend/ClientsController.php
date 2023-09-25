<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function list_clients(Request $request)
    {
        $data = Clients::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("photo", function($data) {
                $html = "<img src=".$data->photo." width='100'>";

                return $html;
            })
            ->editColumn("action", function($data) {
                $urlEdit = route("show-clients", ["id" => $data->id]);
                $urlDelete = route("delete-clients", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editClients(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteClients(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action", "photo"])
            ->make(true);
    }

    public function save_clients(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();

                $validation = Validator::make($request->all(), [
                    "photo" => "required|mimes:png,jpg,jpeg"
                ]);

                if ($validation->fails()) {
                    throw new \Exception("Photo must be type of images");
                }
            }

            $set = [
                "id" => $id,
                "company" => $request->company,
            ];

            if ($request->file('photo') != null) {
                $file = $request->file('photo');
                $filename = Uuid::uuid4()->getHex().date('YmdHi').$file->getClientOriginalExtension();
                $file->move(public_path('front/clients/'), $filename);

                $set['photo'] = "front/clients/".$filename;
            }

            $detect = Clients::find($id);
            if (!$detect) {
                $detect = Clients::create($set);
                if (!$detect->save()) {
                    throw new \Exception("Failed to save data");
                }

            } else {
                if ($request->file('photo') != null) {
                    if (File::exists(public_path($detect->photo))) {
                        File::delete(public_path($detect->photo));
                    }
                }

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

    public function show_clients($id = null)
    {
        $data = Clients::find($id);
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

    public function delete_clients($id = null)
    {
        $data = Clients::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            $file = public_path($data->photo);
            if (File::exists($file)) {
                File::delete($file);
            }

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
