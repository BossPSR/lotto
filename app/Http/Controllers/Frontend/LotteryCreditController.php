<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Deposits;
use App\Models\Transactions;
use App\Models\Withdraws;
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
        $deposits = Deposits::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();
        $withdraws = Withdraws::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();
        $transactions = Transactions::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();

        $wrap = array();
        if($deposits)
        {
            foreach($deposits as $deposit)
            {
                $temp = array(
                    'id' => $deposit->id,
                    'proof_image' => $deposit->proof_image,
                    'status' => $deposit->status,
                    'amount' => $deposit->amount,
                    'created_at' => $deposit->created_at,
                    'remark' => "คุณได้ทำการฝากเงิน จำนวนเงิน ".number_format($deposit->amount, 2)." บาท",
                );
                array_push($wrap, $temp);
            }
        }

        if($withdraws)
        {
            foreach($withdraws as $withdraw)
            {
                $temp = array(
                    'id' => $withdraw->id,
                    'proof_image' => $withdraw->proof_image,
                    'status' => $withdraw->status,
                    'amount' => $withdraw->amount,
                    'created_at' => $withdraw->created_at,
                    'remark' => "คุณได้ทำการถอนเงิน จำนวนเงิน ".number_format($withdraw->amount, 2)." บาท, หมายเหตุ : ".$withdraw->remark,
                );
                array_push($wrap, $temp);
            }
        }

        if($transactions)
        {
            foreach($transactions as $transaction)
            {
                $temp = array(
                    'id' => $transaction->id,
                    'proof_image' => $transaction->proof_image,
                    'status' => $transaction->status,
                    'amount' => $transaction->amount,
                    'created_at' => $transaction->created_at,
                    'remark' => $transaction->remark,
                );
                array_push($wrap, $temp);
            }
        }

        function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }
        
            array_multisort($sort_col, $dir, $arr);
        }

        array_sort_by_column($wrap, 'created_at', SORT_ASC);
        $data = array(
            'transactions' => $wrap
        );
        return view('frontend.lottery_credit', $data);
    }
}
