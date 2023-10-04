<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\CategoryPortfolio;
use App\Models\Certificate;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interest;
use App\Models\Portfolio;
use App\Models\Skills;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::first();
        $education = Education::orderBy('year', 'desc')->get();
        $ability = Ability::latest()->get();
        $clients = Clients::latest()->get();
        $experience = Experience::orderBy('start', 'desc')->get();
        $skills = Skills::get();
        $interest = Interest::get();
        $certificates = Certificate::get();
        $categories = CategoryPortfolio::get();
        $portfolio = Portfolio::get();

        return view('front.index', [
            "user" => $user,
            "age" => Carbon::parse($user->birthday)->age,
            "education" => $education,
            "ability" => $ability,
            "clients" => $clients,
            "experience" => $experience,
            "skills" => $skills,
            "interest" => $interest,
            "certificates" => $certificates,
            "categories" => $categories,
            "portfolio" => $portfolio,
        ]);
    }

    public function send(Request $request)
    {
        DB::beginTransaction();

        try {
            $set = [
                "id" => Uuid::uuid4()->getHex(),
                "fullname" => $request->fullname,
                "email" => $request->email,
                "subject" => $request->subject,
                "message" => $request->message,
                "status" => false
            ];

            $data = Contact::create($set);
            if (!$data->save()) {
                throw new \Exception("Failed to send message");
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "send message successfully"
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred in send message: $message"
            ]);
        }
    }
}
