<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::latest()->get();

        return view('back.pages.message.index', [
            "page" => "message",
            "datas" => $data
        ]);
    }
}
