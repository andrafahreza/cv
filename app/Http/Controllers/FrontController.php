<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\CategoryPortfolio;
use App\Models\Certificate;
use App\Models\Clients;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interest;
use App\Models\Portfolio;
use App\Models\Skills;
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
}
