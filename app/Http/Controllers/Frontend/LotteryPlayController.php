<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommissionSetting;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
use App\Models\HuayRoundShoots;
use App\Models\HuayUns;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (!$vertify)
            return redirect('lottery_play')->with('message', 'ลิงก์ที่ท่านเข้าหมดเวลาแล้ว!')->with('status', 'error');;

        return view('frontend.lottery_government', ['huay_round' => $vertify]);
    }

    public function lottery_yeekee()
    {
        return view('frontend.lottery_yeekee');
    }

    public function lottery_government_post(Request $request)
    {
        if (isset($request->shoot_number)) {
            $check = HuayRounds::where('secret', $request->huay_secret)->where('is_active', 1)->first();
            if ($check) {
                $hidden_username = Auth::user()->username;
                if (strlen($hidden_username) <= 3) {
                    if (isset($hidden_username[0]))
                        $hidden_username[0] = '*';
                    if (isset($hidden_username[1]))
                        $hidden_username[1] = '*';
                    if (isset($hidden_username[2]))
                        $hidden_username[2] = '*';
                } else {
                    if (isset($hidden_username[3]))
                        $hidden_username[3] = '*';
                    if (isset($hidden_username[4]))
                        $hidden_username[4] = '*';
                    if (isset($hidden_username[5]))
                        $hidden_username[5] = '*';
                }
                $shoot = new HuayRoundShoots();
                $shoot->secret = $request->huay_secret;
                $shoot->user_id = Auth::user()->id;
                $shoot->huay_category_id = $check->huay_category_id;
                $shoot->huay_id = $check->huay_id;
                $shoot->huay_round_id = $check->id;
                $shoot->user_name_secret = $hidden_username;
                $shoot->number = $request->number;
                $shoot->save();

                $wrap = array('next_time' => date('d M Y H:i:s', strtotime('+10 seconds')));
                return response()->json($wrap, 200);
            } else
                return response()->json($request, 401);
        }
        if (isset($request->shoot_list)) {
            $check = HuayRounds::where('secret', $request->huay_secret)->where('is_active', 1)->first();
            if ($check) {
                $list = HuayRoundShoots::where('secret', $request->huay_secret)->orderByDesc('id')->get();
                $total = 0;
                if ($list) {
                    foreach ($list as $key => $value) {
                        $list[$key]->datetime = date('d/m/Y H:i:s', strtotime($value->created_at));
                        $total += $value->number;
                    }
                }
                $wrap = array(
                    'list' => $list,
                    'total' => $total
                );
                return response()->json($wrap, 200);
            }
        } else if (isset($request->get_user_pocket)) {
            $wrap = array(
                'money' => Auth::user()->money,
                'credit' => Auth::user()->credit,
            );
            return response()->json($wrap, 200);
        } else if (isset($request->get_uns)) {
            $numbers = HuayUns::where('huay_category_id', $request->huay_category_id)->get();
            $wrap = array();
            if ($numbers) {
                foreach ($numbers as $value) {
                    if (!isset($wrap[$value->huay_type]))
                        $wrap[$value->huay_type] = array();

                    $wrap[$value->huay_type][$value->number] =  1;
                }
            }

            return response()->json($wrap, 200);
        } else if (isset($request->check_money)) {
            $wrap = array(
                'money' => Auth::user()->money,
                'credit' => Auth::user()->credit,
                'pass' => false,
            );
            if (Auth::user()->money - $request->total_price > 0)
                $wrap['pass'] = true;

            return response()->json($wrap, 200);
        } else if (isset($request->send_poy)) {
            $check = HuayRounds::where('secret', $request->huay_secret)->where('is_active', 1)->first();
            if ($check) {
                $total_price = 0;
                foreach ($request->number as $huay_type => $list) {
                    if ($list) {
                        foreach ($list as $info) {
                            $total_price += ($info['multiple']);
                        }
                    }
                }

                if (Auth::user()->money - $total_price < 0)
                    return response()->json(array('a' => Auth::user()->money, 'b' => $total_price), 401);

                $commission_setting = CommissionSetting::first();
                if (Auth::user()->upline_id && $commission_setting->commission_percent > 0) {

                    $commission = (($total_price / 100) * $commission_setting->commission_percent);
                    $credit_cf = new Transactions();
                    $credit_cf->user_id = Auth::user()->upline_id;
                    $credit_cf->status = 'confirm';
                    $credit_cf->direction = 'IN';
                    $credit_cf->type = 'CREDIT';
                    $credit_cf->remark = 'คุณได้รับ ' . $commission . ' (' . $commission_setting->commission_percent . '%)เครดิตจากแทงหวยของ ' . Auth::user()->username;
                    $credit_cf->amount = $commission;
                    $credit_cf->save();
                    DB::table("users")->where('id', Auth::user()->upline_id)->increment('credit', $commission);
                }


                DB::table("users")->where('id', Auth::user()->id)->decrement('money', $total_price);

                // ดึงเลขอั้น 
                $numbers = HuayUns::where('huay_category_id', $check->huay_category_id)->get();
                $uns = array();
                if ($numbers) {
                    foreach ($numbers as $value) {
                        if (!isset($uns[$value->huay_type]))
                            $uns[$value->huay_type] = array();

                        $uns[$value->huay_type][$value->number] =  1;
                    }
                }

                // สร้างโพย
                $poy = new HuayRoundPoys();
                $poy->name = '';
                $poy->user_id = Auth::user()->id;
                $poy->huay_category_id = $check->huay_category_id;
                $poy->huay_id = $check->huay_id;
                $poy->huay_round_id = $check->id;
                $poy->secret = $request->huay_secret;

                $poy->save();

                if ($poy->id) {
                    foreach ($request->number as $huay_type => $list) {
                        if ($list) {
                            foreach ($list as $info) {
                                $poy_number = new HuayRoundPoyNumbers();
                                $poy_number->huay_round_poy_id = $poy->id;
                                $poy_number->user_id = Auth::user()->id;
                                $poy_number->huay_type = $huay_type;
                                $poy_number->huay_category_id = $check->huay_category_id;
                                $poy_number->huay_id = $check->huay_id;
                                $poy_number->huay_round_id = $check->id;
                                $poy_number->secret = $request->huay_secret;
                                $poy_number->number = $info['number'];
                                $poy_number->multiple = $info['multiple'];
                                $poy_number->huay_price = $info['price'];
                                $poy_number->total_price = ($info['multiple'] * $info['price']);
                                if (isset($uns[$huay_type][$info['number']]))
                                    $poy_number->is_un = 1;

                                $poy_number->save();
                            }
                        }
                    }
                    return response()->json(null, 200);
                }
            }
        }
        $sample = array("error");
        return response()->json($sample, 401);
    }
}
