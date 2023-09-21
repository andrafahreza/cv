<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('back.pages.profile.index', [
            "page" => "profile"
        ]);
    }

    public function save_profile(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = User::find(Auth::user()->id);
            $data->username = $request->username;
            $data->job = $request->job;
            $data->facebook = $request->facebook;
            $data->linkedin = $request->linkedin;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->birthday = $request->birthday;
            $data->about = $request->about;
            $data->gender = $request->gender;
            $data->lat = $request->lat;
            $data->lng = $request->lng;

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = rand(10000, 99999).date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('back/assets/images/user/'), $filename);

                $oldPhoto = public_path($data->photo);
                if (File::exists($oldPhoto)) {
                    File::delete($oldPhoto);
                }

                $data->photo = "back/assets/images/user/".$filename;
            }

            if (!$data->update()) {
                throw new \Exception("Failed to update data");
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

    public function change_pass(Request $request)
    {
        try {
            $data = User::find(Auth::user()->id);

            if (!Hash::check($request->current_password, $data->password)) {
                throw new \Exception("current password entered is incorrect");
            }

            if ($request->new_password != $request->retype) {
                throw new \Exception("The new password does not match");
            }

            $data->password = Hash::make($request->new_password);

            if (!$data->update()) {
                throw new \Exception("Failed to update data");
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

    public function upload_cv(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                "cv" => "required|mimes:pdf"
            ]);

            if ($validation->fails()) {
                throw new \Exception("CV must be type of file PDF");
            }

            $data = User::find(Auth::user()->id);

            $file = $request->file('cv');
            $filename = rand(10000, 99999).date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('front/cv/'), $filename);

            $oldFile = public_path($data->cv);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $data->cv = "front/cv/".$filename;

            if (!$data->update()) {
                throw new \Exception("Failed to update data");
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
}
