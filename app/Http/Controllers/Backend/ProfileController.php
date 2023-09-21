<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
                throw new \Exception("Gagal memperbarui data");
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Berhasil memperbarui data"
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "Terjadi kesalahan dalam menyimpan data $message"
            ]);
        }
    }
}
