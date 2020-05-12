<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryPlayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.lottery_play');
    }

    public function lottery_government()
    {
        return view('frontend.lottery_government');
    }

    public function lottery_yeekee()
    {
        return view('frontend.lottery_yeekee');
    }
}
