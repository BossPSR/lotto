<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryNumberSetController extends Controller
{
    public function index()
    {
        return view('lottery_number_set');
    }    
}
