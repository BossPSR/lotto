<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Auth;
use App\Models\HuayRoundPoys;
use App\Models\BonusNormal;
use App\Models\User;

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
        $huayRound_poys = HuayRoundPoys::where('poy_status', 'complete')->where('user_id', Auth::user()->id)->get();
        $numPrice = 0;
        foreach ($huayRound_poys as  $price) {
            $numPrice += $price['total_price'];
        }

        $round_one = 0;
        $round_two = 0;
        $round_three = 0;
        $round_four = 0;
        $round_five = 0;
        $round_six = 0;
        $round_seven = 0;
        $round_eight = 0;
        $round_nine = 0;
        $round_ten = 0;

        $bonusNormals = BonusNormal::where('user_id', Auth::user()->id)->get();
        foreach ($bonusNormals as $bonusNormal) {
            if ($bonusNormals['round'] == 1) {
                $round_one = 1;
            }
            if ($bonusNormals['round'] == 2) {
                $round_two = 1;
            }
            if ($bonusNormals['round'] == 3) {
                $round_three = 1;
            }
            if ($bonusNormals['round'] == 4) {
                $round_four = 1;
            }
            if ($bonusNormals['round'] == 5) {
                $round_five = 1;
            }
            if ($bonusNormals['round'] == 6) {
                $round_six = 1;
            }
            if ($bonusNormals['round'] == 7) {
                $round_seven = 1;
            }
            if ($bonusNormals['round'] == 8) {
                $round_eight = 1;
            }
            if ($bonusNormals['round'] == 9) {
                $round_nine = 1;
            }
            if ($bonusNormals['round'] == 10) {
                $round_ten = 1;
            }
        }

        $data['numPrice'] = $numPrice;
        $data['round_one'] = $round_one;
        $data['round_two'] = $round_two;
        $data['round_three'] = $round_three;
        $data['round_four'] = $round_four;
        $data['round_five'] = $round_five;
        $data['round_six'] = $round_six;
        $data['round_seven'] = $round_seven;
        $data['round_eight'] = $round_eight;
        $data['round_nine'] = $round_nine;
        $data['round_ten'] = $round_ten;
        return view('frontend.bonus_normal', $data);
    }

    public function bonus_normal_process(Request $request)
    {
        $bonusNormal = BonusNormal::where('user_id', Auth::user()->id)->orderBy('id','DESC')->first();
        $round = 1;

        if (!empty($bonusNormals)) {
            $round += $bonusNormal['round'];
        }

        $bonus_normal = new BonusNormal;
        $bonus_normal->round = $round;
        $bonus_normal->user_id = Auth::user()->id;
        $bonus_normal->save();

        $user = User::where('id',Auth::user()->id)->first();
        $free_money = 200;
        $free_money += $user->money;
        $user->money = $free_money;
        $user->save();

        return redirect()->route('bonus_normal')->with('message', 'สำเร็จ! ได้รับเครดิตฟรี200 บาทแล้ว')->with('status', 'success');
    }

    public function bonus_vip()
    {
        $data = array();
        $huay_complete = HuayRoundPoys::where('poy_status', 'complete')->where('user_id', Auth::user()->id)->get();
        $numPrice_complete = 0;
        foreach ($huay_complete as  $price_complete) {
            $numPrice_complete += $price_complete['total_price'];
        }
        $data['numPrice_complete'] = $numPrice_complete;

        $huay_pending = HuayRoundPoys::where('poy_status', 'pending')->where('user_id', Auth::user()->id)->get();
        $numPrice_pending = 0;
        foreach ($huay_pending as  $price_pending) {
            $numPrice_pending += $price_pending['total_price'];
        }
        $data['numPrice_pending'] = $numPrice_pending;

        return view('frontend.bonus_vip', $data);
    }
}
