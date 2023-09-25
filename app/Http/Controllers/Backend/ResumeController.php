<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        return view('back.pages.resume.index', [
            "page" => "resume"
        ]);
    }
}
