<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Auth;

class LotteryBonusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'single.device.login']);
    }

    public function index()
    {
        $transactions = Transactions::where('type', 'BONUS')->where('user_id', Auth::user()->id)->get();

        $data = array('transactions' => $transactions);
        return view('frontend.lottery_bonus', $data);
    }

    public function bonus_normal()
    {
        $data = array();
        return view('frontend.bonus_normal', $data);
    }

    public function bonus_vip()
    {

        $data = array();
        return view('frontend.bonus_vip', $data);
    }
}
