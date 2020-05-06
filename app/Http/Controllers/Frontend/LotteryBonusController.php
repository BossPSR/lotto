<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryBonusController extends Controller
{
    public function index()
    {
        return view('frontend.lottery_bonus');
    }
}
