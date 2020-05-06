<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryBonusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.lottery_bonus');
    }
}
