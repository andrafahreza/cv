<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPortfolio;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('back.pages.portfolio.index', [
            "page" => "portfolio"
        ]);
    }

    public function list_portfolio(Request $request)
    {
        $data = Portfolio::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('id_category', function($data) {
                return $data->category->category;
            })
            ->editColumn('link', function($data) {
                return "<a href=".$data->link." target='_blank'>Open</a>";
            })
            ->editColumn("photo", function($data) {
                $html = "<img src=".$data->photo." width='100'>";

                return $html;
            })
            ->editColumn("action", function($data) {
                $urlEdit = route("show-portfolio", ["id" => $data->id]);
                $urlDelete = route("delete-portfolio", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editPortfolio(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deletePortfolio(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action", "photo", "link"])
            ->make(true);
    }

    public function save_portfolio(Request $request, $id = null)
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

            if (!CategoryPortfolio::find($request->id_category)) {
                throw new \Exception("Category Not Found");
            }

            $set = [
                "id" => $id,
                "id_category" => $request->id_category,
                "title" => $request->title,
                "link" => $request->link == null ? "#" : $request->link,
            ];

            if ($request->file('photo') != null) {
                $file = $request->file('photo');
                $filename = Uuid::uuid4()->getHex().date('YmdHi').".".$file->getClientOriginalExtension();
                $file->move(public_path('front/portfolio/'), $filename);

                $set['photo'] = "front/portfolio/".$filename;
            }

            $detect = Portfolio::find($id);
            if (!$detect) {
                $detect = Portfolio::create($set);
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

    public function show_portfolio($id = null)
    {
        $data = Portfolio::find($id);
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

    public function delete_portfolio($id = null)
    {
        $data = Portfolio::find($id);
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

    // CATEGORY
    public function search_category(Request $request)
    {
        try {
            $data = CategoryPortfolio::select(['id', 'category'])->where('category', 'like', '%' . $request->term . '%')->get();

            return response()->json([
                "results" => $data
            ]);

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }

    public function list_category(Request $request)
    {
        $data = CategoryPortfolio::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("action", function($data) {
                $urlEdit = route("show-category", ["id" => $data->id]);
                $urlDelete = route("delete-category", ["id" => $data->id]);
                $html = '<button class="btn bg-info-light btn-rounded btn-sm my-0" onclick="editCategory(\''.$urlEdit.'\')">
                    Edit
                </button>
                <button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteCategory(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action"])
            ->make(true);
    }

    public function save_category(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();
            }

            $set = [
                "id" => $id,
                "category" => $request->category,
            ];

            $detect = CategoryPortfolio::find($id);
            if (!$detect) {
                $detect = CategoryPortfolio::create($set);
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

    public function show_category($id = null)
    {
        $data = CategoryPortfolio::find($id);
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

    public function delete_category($id = null)
    {
        $data = CategoryPortfolio::find($id);
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
