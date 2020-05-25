<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request)
    {
        if (isset($request->get_number_list)) {
            $wrap = array();
            $numbers = HuayRoundPoyNumbers::where('huay_round_poy_id', $request->huay_round_poy_id)->get();
            if ($numbers) {
                foreach ($numbers as $key => $value) {
                    if (!isset($wrap[$value->huay_type]))
                        $wrap[$value->huay_type] = array();

                    if ($value->is_won == 1) {
                        $value->total_price_txt = number_format($value->total_price, 2);
                    } else if ($value->is_won == -1) {
                        $value->total_price_txt = number_format(0, 2);
                    } else {
                        $value->total_price_txt = number_format(0, 2);
                    }

                    $value->multiple_txt = number_format($value->multiple, 2);

                    array_push($wrap[$value->huay_type], $value);
                }
            }
            return response()->json($wrap, 200);
        }
        else if (isset($request->delete_poy)) {
            $wrap = array();
            $numbers = HuayRoundPoys::where('id', $request->huay_round_poy_id)->first();
            $numbers->delete();
            return response()->json($wrap, 200);
        } else
            return response()->json(null, 401);
    }

    public function index()
    {
        $poys = HuayRoundPoys::where('is_my_poy', 0)->where('user_id', Auth::user()->id)->get();
        if ($poys) {
            $poy_id_all = array();
            $huay_round_id_all = array();
            foreach ($poys as $value) {
                array_push($poy_id_all, $value->id);
                array_push($huay_round_id_all, $value->huay_round_id);
            }

            $huay_rounds = HuayRounds::whereIn('id', $huay_round_id_all)->get();

            $huay_round_by_id = array();
            if ($huay_rounds) {
                foreach ($huay_rounds as $value) {
                    $huay_round_by_id[$value->id] = $value;
                }
            }

            

            foreach ($poys as $index => $poy) {
                $poys[$index]->round_info = isset($huay_round_by_id[$poy->huay_round_id]) ? $huay_round_by_id[$poy->huay_round_id] : array();
                $poys[$index]->datetime = date('d/m/Y H:i:s', strtotime($poy->created_at));
                $poys[$index]->code = 'PY' . sprintf('%04d', $poy->id);
            }
        }
        return view('frontend.lottery_transaction', ['poy_list' => $poys]);
    }
}
