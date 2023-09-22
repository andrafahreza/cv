<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::first();
        $education = Education::orderBy('year')->get();

        return view('front.pages.index', [
            "user" => $user,
            "age" => Carbon::parse($user->birthday)->age,
            "education" => $education
        ]);
    }
}
