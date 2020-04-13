<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function index_member()
    {
        return view('index_member');
    }
}
