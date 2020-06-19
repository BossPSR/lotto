<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HuayRounds;
use App\Models\HuayRoundShoots;

class LotteryResultController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'single.device.login']);
    }

    public function index()
    {
        $huay_rounds = HuayRounds::whereBetween('start_datetime', array(date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')))
            ->join('huay_categorys', 'huay_rounds.huay_category_id', '=', 'huay_categorys.id')
            ->select('huay_rounds.*', 'huay_categorys.name as category_name')
            ->get();

        $huay_round_by_category = array();
        if ($huay_rounds) {
            foreach ($huay_rounds as $round) {
                if (!isset($huay_round_by_category[$round->category_name]))
                    $huay_round_by_category[$round->category_name] = array();

                array_push($huay_round_by_category[$round->category_name], $round);
            }
        }

        $data = array(
            'huay_round_by_category' => $huay_round_by_category
        );
        return view('frontend.lottery_result', $data);
    }

    public function result_yeekee()
    {
        $huay_round = HuayRounds::where("secret", $_GET['huay_secret'])->where('round_status', 'complete')->first();

        if (!$huay_round)
            return redirect('lottery_result')->with('message', 'ลิงก์ที่ท่านเข้าหมดเวลาแล้ว!')->with('status', 'error');;

        $shoot_number =  HuayRoundShoots::where('huay_round_id', $huay_round->id)->orderBy('id', 'DESC')->get();
        
        $data = array(
            'huay_round' => $huay_round,
            'shoot_numbers' => $shoot_number
        );


        return view('frontend.lottery_result_yeekee', $data);
    }
}
