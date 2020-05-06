<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.help');
    }
}
