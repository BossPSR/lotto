<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Auth;
use App\Models\HuayRoundPoys;
use App\Models\BonusNormal;
use App\Models\User;
use App\Models\BonusVip;
use Illuminate\Http\Request;

class LotteryBonusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'single.device.login']);
    }

    private function DateDiff($strDate1,$strDate2)
    {
        return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
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
            $checkDate = $this->DateDiff($bonusNormal['created_date'],date('Y-m-d'));
            $checkDate += 1;
            if ($checkDate > 10) {
                return redirect()->route('bonus_normal')->with('message', 'เกิดข้อผิดพลาด!')->with('status', 'error');
                exit();
            }
        }

        $bonus_normal = new BonusNormal;
        $bonus_normal->round = $round;
        $bonus_normal->user_id = Auth::user()->id;
        $bonus_normal->created_date = date('Y-m-d');
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
        //จำนวน complete
        $data['numPrice_complete'] = $numPrice_complete;

        $huay_pending = HuayRoundPoys::where('poy_status', 'pending')->where('user_id', Auth::user()->id)->get();
        $numPrice_pending = 0;
        foreach ($huay_pending as  $price_pending) {
            $numPrice_pending += $price_pending['total_price'];
        }
        //จำนวน pending
        $data['numPrice_pending'] = $numPrice_pending;

        $bonusVip = BonusVip::where('user_id', Auth::user()->id)->orderBy('id','DESC')->first();
        $numVip = 1;
        $priceVip = 0;
        $bonusVip_price = 0;
        $list = [];
        if ( $_GET['page'] == 'index') {
            $priceVip = 10000;
            $bonusVip_price = 200;
            $list[] = 0;
            $list[] = 1;
            $list[] = 2;
            $list[] = 3;
            $list[] = 4;
            $list[] = 5;
            $list[] = 6;
            $list[] = 7;
            $list[] = 8;
            $list[] = 9;
            $list[] = 10;
        }
        if ( $_GET['page'] == 'index_two') {
            $priceVip = 20000;
            $bonusVip_price = 500;
            $list[] = 10;
            $list[] = 11;
            $list[] = 12;
            $list[] = 13;
            $list[] = 14;
            $list[] = 15;
            $list[] = 16;
            $list[] = 17;
            $list[] = 18;
            $list[] = 19;
            $list[] = 20;
        }
        if ( $_GET['page'] == 'index_three') {
            $priceVip = 30000;
            $bonusVip_price = 750;
            $list[] = 20;
            $list[] = 21;
            $list[] = 22;
            $list[] = 23;
            $list[] = 24;
            $list[] = 25;
            $list[] = 26;
            $list[] = 27;
            $list[] = 28;
            $list[] = 29;
            $list[] = 30;
        }
        if ( $_GET['page'] == 'index_four') {
            $priceVip = 40000;
            $bonusVip_price = 1000;
            $list[] = 30;
            $list[] = 31;
            $list[] = 32;
            $list[] = 33;
            $list[] = 34;
            $list[] = 35;
            $list[] = 36;
            $list[] = 37;
            $list[] = 38;
            $list[] = 39;
            $list[] = 40;
        }
        if ( $_GET['page'] == 'index_five') {
            $priceVip = 50000;
            $bonusVip_price = 1250;
            $list[] = 40;
            $list[] = 41;
            $list[] = 42;
            $list[] = 43;
            $list[] = 44;
            $list[] = 45;
            $list[] = 46;
            $list[] = 47;
            $list[] = 48;
            $list[] = 49;
            $list[] = 50;
        }
        if ( $_GET['page'] == 'index_six') {
            $priceVip = 100000;
            $bonusVip_price = 3000;
            $list[] = 50;
            $list[] = 51;
            $list[] = 52;
            $list[] = 53;
            $list[] = 54;
            $list[] = 55;
            $list[] = 56;
            $list[] = 57;
            $list[] = 58;
            $list[] = 59;
            $list[] = 60;
        }
        if ( $_GET['page'] == 'index_seven') {
            $priceVip = 200000;
            $bonusVip_price = 6000;
            $list[] = 60;
            $list[] = 61;
            $list[] = 62;
            $list[] = 63;
            $list[] = 64;
            $list[] = 65;
            $list[] = 66;
            $list[] = 67;
            $list[] = 68;
            $list[] = 69;
            $list[] = 70;
        }
        if ( $_GET['page'] == 'index_eight') {
            $priceVip = 300000;
            $bonusVip_price = 9000;
            $list[] = 70;
            $list[] = 71;
            $list[] = 72;
            $list[] = 73;
            $list[] = 74;
            $list[] = 75;
            $list[] = 76;
            $list[] = 77;
            $list[] = 78;
            $list[] = 79;
            $list[] = 80;
        }
        if ( $_GET['page'] == 'index_nine') {
            $priceVip = 400000;
            $bonusVip_price = 12000;
            $list[] = 80;
            $list[] = 81;
            $list[] = 82;
            $list[] = 83;
            $list[] = 84;
            $list[] = 85;
            $list[] = 86;
            $list[] = 87;
            $list[] = 88;
            $list[] = 89;
            $list[] = 90;
        }
        $checkVip_ten = 0;
        if ( $_GET['page'] == 'index_ten') {

            $priceVip = [];
            $priceVip[] = 1000000;
            $priceVip[] = 2000000;
            $priceVip[] = 3000000;
            $priceVip[] = 4000000;
            $priceVip[] = 5000000;
            $priceVip[] = 6000000;
            $priceVip[] = 7000000;
            $priceVip[] = 8000000;
            $priceVip[] = 10000000;
            // numPrice_complete
            if ($numPrice_complete < $priceVip[0]) {
                $checkVip_ten = 1000000;
            }
            if ($numPrice_complete == $priceVip[0] && $numPrice_complete < $priceVip[1]) {
                $checkVip_ten = 1000000;
            }
            if ($numPrice_complete == $priceVip[1] && $numPrice_complete < $priceVip[2]) {
                $checkVip_ten = 2000000;
            }
            if ($numPrice_complete == $priceVip[2] && $numPrice_complete < $priceVip[3]) {
                $checkVip_ten = 3000000;
            }
            if ($numPrice_complete == $priceVip[3] && $numPrice_complete < $priceVip[4]) {
                $checkVip_ten = 4000000;
            }
            if ($numPrice_complete == $priceVip[4] && $numPrice_complete < $priceVip[5]) {
                $checkVip_ten = 5000000;
            }
            if ($numPrice_complete == $priceVip[5] && $numPrice_complete < $priceVip[6]) {
                $checkVip_ten = 6000000;
            }
            if ($numPrice_complete == $priceVip[6] && $numPrice_complete < $priceVip[7]) {
                $checkVip_ten = 7000000;
            }
            if ($numPrice_complete == $priceVip[7] && $numPrice_complete < $priceVip[8]) {
                $checkVip_ten = 8000000;
            }
            if ($numPrice_complete >= $priceVip[8]) {
                $checkVip_ten = 1000000;
            }

            $bonusVip_price = [];
            $bonusVip_price[] = 35000;
            $bonusVip_price[] = 70000;
            $bonusVip_price[] = 105000;
            $bonusVip_price[] = 140000;
            $bonusVip_price[] = 175000;
            $bonusVip_price[] = 240000;
            $bonusVip_price[] = 280000;
            $bonusVip_price[] = 320000;
            $bonusVip_price[] = 500000;

            $list[] = 90;
            $list[] = 91;
            $list[] = 92;
            $list[] = 93;
            $list[] = 94;
            $list[] = 95;
            $list[] = 96;
            $list[] = 97;
            $list[] = 98;
            $list[] = 99;
            $list[] = 100;
        }
        // ราคาแต่ละรอบ
        $data['priceVip'] = $priceVip;


        if (!empty($bonusVip)) {
            $numVip += $bonusVip['round'];
        }

        //ระดับปัจจุบัน
        $data['bonusVip'] = $numVip;
        // เฉพาะระดับ สุดท้าย
        $data['checkVip_ten'] = $checkVip_ten;


        //ระดับลิส vip
        $data['list'] = $list;

        //รางวัล
        $data['bonusVip_price'] = $bonusVip_price;

        return view('frontend.bonus_vip', $data);
    }

    public function bonus_vip_process(Request $request)
    {
        $bonusVip = BonusVip::where('user_id', Auth::user()->id)->orderBy('id','DESC')->first();
        $round = 1;

        if (!empty($bonusNormals)) {
            $round += $bonusVip['round'];
        }

        $bonus_normal = new BonusVip;
        $bonus_normal->round = $round;
        $bonus_normal->user_id = Auth::user()->id;
        $bonus_normal->created_date = date('Y-m-d');
        $bonus_normal->save();

        $user = User::where('id',Auth::user()->id)->first();
        $free_money = $request->bonus;
        $free_money += $user->money;
        $user->money = $free_money;
        $user->save();

        return redirect('bonus_vip?page=index')->with('message', 'สำเร็จ! ได้รับเครดิตฟรี'.$request->bonus.' บาทแล้ว')->with('status', 'success');
    }
}
