<?php

namespace App\Http\Controllers\Frontend;

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

    public function plus_story()
    {
        return view('plus_story');
    }

    public function lottery_withdraw()
    {
        return view('lottery_withdraw');
    }
}
