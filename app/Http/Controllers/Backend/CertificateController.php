<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class CertificateController extends Controller
{
    public function index()
    {
        return view('back.pages.certificate.index', [
            "page" => "certificate"
        ]);
    }

    public function list_certificate(Request $request)
    {
        $data = Certificate::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("logo", function($data) {
                $html = "<img src=".$data->logo." width='100'>";

                return $html;
            })
            ->editColumn("file", function($data) {
                $html = "<a href=".asset($data->file)." target='_blank'>Buka</a>";

                return $html;
            })
            ->editColumn("action", function($data) {
                $urlDelete = route("delete-certificate", ["id" => $data->id]);
                $html = '<button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteData(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action", "logo", "file"])
            ->make(true);
    }

    public function save_certificate(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();

                $validation = Validator::make($request->all(), [
                    "logo" => "required|mimes:png,jpg,jpeg",
                    "file" => "required|mimes:pdf",
                ]);

                if ($validation->fails()) {
                    throw new \Exception("Thumbnail must be type of images, FIle must be PDF");
                }
            }

            $set = [
                "id" => $id,
                "title" => $request->title,
                "date" => $request->date,
            ];

            if ($request->file('logo') != null) {
                $file = $request->file('logo');
                $filename = Uuid::uuid4()->getHex().date('YmdHi').".".$file->getClientOriginalExtension();
                $file->move(public_path('front/certificate/logo/'), $filename);

                $set['logo'] = "front/certificate/logo/".$filename;
            }

            if ($request->file('file') != null) {
                $file = $request->file('file');
                $filename = Uuid::uuid4()->getHex().date('YmdHi').".".$file->getClientOriginalExtension();
                $file->move(public_path('front/certificate/file/'), $filename);

                $set['file'] = "front/certificate/file/".$filename;
            }

            $detect = Certificate::find($id);
            if (!$detect) {
                $detect = Certificate::create($set);
                if (!$detect->save()) {
                    throw new \Exception("Failed to save data");
                }

            } else {
                if ($request->file('logo') != null) {
                    if (File::exists(public_path($detect->logo))) {
                        File::delete(public_path($detect->logo));
                    }
                }

                if ($request->file('file') != null) {
                    if (File::exists(public_path($detect->file))) {
                        File::delete(public_path($detect->file));
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

    public function delete_certificate($id = null)
    {
        $data = Certificate::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            $logo = public_path($data->logo);
            if (File::exists($logo)) {
                File::delete($logo);
            }

            $file = public_path($data->file);
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
