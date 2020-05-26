<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class LotteryCreditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $_GET['start_date'] = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');
        $_GET['end_date'] = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

        $transactions = Transactions::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();
        $data = array(
            'transactions' => $transactions
        );
        return view('frontend.lottery_credit', $data);
    }
}
