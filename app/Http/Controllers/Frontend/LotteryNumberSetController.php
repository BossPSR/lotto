<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryNumberSetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'single.device.login']);
    }

    public function post(Request $request)
    {
        if (isset($request->add_custom_poy)) {
            $poy = new HuayRoundPoys();
            $poy->name = $request->name;
            $poy->is_my_poy = 1;
            $poy->huay_category_id = 0;
            $poy->huay_id = 0;
            $poy->huay_round_id = 0;
            $poy->secret = "-";
            $poy->user_id = Auth::user()->id;
            $poy->save();

            if($poy->id)
            {
                foreach($request->number_array as $info)
                {
                    $number = new HuayRoundPoyNumbers();
                    $number->huay_category_id = 0;
                    $number->huay_id = 0;
                    $number->huay_round_id = 0;
                    $number->huay_round_poy_id = $poy->id;
                    $number->secret = '-';
                    $number->user_id = $poy->user_id;
                    $number->huay_type = $info['huay_type'];
                    $number->number = $info['number'];
                    $number->save();
                }
            }
            return response()->json($poy->id, 200);
        } 
        else if(isset($request->get_poy_list))
        {
            $poys = HuayRoundPoys::where('is_my_poy', 1)->where('deleted_at', null)->where('user_id', Auth::user()->id)->OrderBy('created_at', 'desc')->get();
            if ($poys) {
                $poy_id_all = array();
                $huay_round_id_all = array();
                foreach ($poys as $value) {
                    array_push($poy_id_all, $value->id);
                    array_push($huay_round_id_all, $value->huay_round_id);
                }
    
                foreach ($poys as $index => $poy) {
                    $poys[$index]->datetime = date('d/m/Y H:i:s', strtotime($poy->created_at));
                }
            }
            return response()->json($poys, 200);
        }
        else
            return response()->json(null, 401);
    }

    public function index()
    {
        return view('frontend.lottery_number_set');
    }
}
