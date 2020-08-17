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
        $this->middleware(['auth', 'single.device.login']);
    }

    public function index()
    {
        $_GET['start_date'] = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');
        $_GET['end_date'] = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');
        // $deposits = Deposits::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();
        // $withdraws = Withdraws::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();
        $transactions = Transactions::where('user_id', Auth::user()->id)->whereBetween('created_at', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'))->get();

        $wrap = array();

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
