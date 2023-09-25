<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Clients;
use App\Models\Education;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::first();
        $education = Education::orderBy('year', 'desc')->get();
        $ability = Ability::latest()->get();
        $clients = Clients::latest()->get();

        return view('front.index', [
            "user" => $user,
            "age" => Carbon::parse($user->birthday)->age,
            "education" => $education,
            "ability" => $ability,
            "clients" => $clients
        ]);
    }
}
