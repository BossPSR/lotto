<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class LotteryTransactionController extends Controller
{
    public function index()
    {
        return view('lottery_transaction');
    }

}
