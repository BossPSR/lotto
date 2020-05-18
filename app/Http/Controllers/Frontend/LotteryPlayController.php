<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HuayRounds;
use Illuminate\Support\Facades\DB;

class LotteryPlayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('frontend.lottery_play', $data);
    }

    public function lottery_government()
    {
        $_GET['huay_secret'] = isset($_GET['huay_secret']) ? $_GET['huay_secret'] : null;
        $vertify = HuayRounds::where('is_active', 1)->where('secret', $_GET['huay_secret'])->first();
        if(!$vertify)
            return redirect('lottery_play')->with('message', 'ลิงก์ที่ท่านเข้าหมดเวลาแล้ว!')->with('status', 'error');;

        return view('frontend.lottery_government');
    }

    public function lottery_yeekee()
    {
        return view('frontend.lottery_yeekee');
    }
}
