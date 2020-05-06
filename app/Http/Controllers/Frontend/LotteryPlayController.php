<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryPlayController extends Controller
{
    public function index()
    {
        return view('frontend.lottery_play');
    }

}
