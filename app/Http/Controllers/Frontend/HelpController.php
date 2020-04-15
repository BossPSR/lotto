<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class HelpController extends Controller
{
    public function index()
    {
        return view('help');
    }
}
