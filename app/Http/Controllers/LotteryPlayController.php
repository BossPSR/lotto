<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LotteryPlayController extends Controller
{
    public function index()
    {
        return view('lottery_play');
    }

}
