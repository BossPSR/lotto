<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommissionSetting;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
use App\Models\HuayRoundShoots;
use App\Models\Huays;
use App\Models\HuayUns;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LotteryPlayController extends Controller
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
            $last = HuayRoundShoots::where('secret', $request->huay_secret)->where('user_id', Auth::user()->id)->OrderBy('id', 'DESC')->first();
            if ($check && $last && date('Y-m-d H:i:s', strtotime($last->created_at.' +9 seconds')) < now() or !$last) {
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
            $huay_round = HuayRounds::where('secret', $request->huay_secret)->first();
            $numbers = HuayUns::where('huay_category_id', $request->huay_category_id)->where('huay_id', $huay_round->huay_id)->where('is_enable', 1)->get();
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

                // ดึงเลขอั้น 
                $numbers = HuayUns::where('huay_category_id', $check->huay_category_id)->where('huay_id', $check->huay_id)->where('is_enable', 1)->get();
                $uns = array();
                if ($numbers) {
                    foreach ($numbers as $value) {
                        if (!isset($uns[$value->huay_type]))
                            $uns[$value->huay_type] = array();

                        $uns[$value->huay_type][$value->number] =  $value;
                    }
                }

                // ถ้ามีอั้นจะฟิวเตอร์ก่อน

                $uns_number_in_this_poy = array();
                $error_txt = '';
                if ($uns) {
                    foreach ($request->number as $huay_type => $list) {
                        foreach ($list as $info) {
                            if (isset($uns[$huay_type][$info['number']]) && ($uns[$huay_type][$info['number']]->max_price - 100) > 0) {

                                if (!isset($uns_number_in_this_poy[$huay_type])) {
                                    $uns_number_in_this_poy[$huay_type] = array(
                                        'number_list' => array(),
                                        'uns_info' => $uns[$huay_type][$info['number']],
                                        'play_price' => array()
                                    );
                                }
                                array_push($uns_number_in_this_poy[$huay_type]['number_list'], $info['number']);

                                if (!isset($uns_number_in_this_poy[$huay_type]['play_price'][$info['number']]))
                                    $uns_number_in_this_poy[$huay_type]['play_price'][$info['number']] = 0;

                                $uns_number_in_this_poy[$huay_type]['play_price'][$info['number']] += $info['multiple'];

                                // เช็คว่าเล่นเกิน ที่ตั้งไว้ไหม
                                if ($uns_number_in_this_poy[$huay_type]['play_price'][$info['number']] > ($uns[$huay_type][$info['number']]->max_price - 100) &&  $uns[$huay_type][$info['number']]->over_percent == 0) {
                                    $error_txt .= $info['number'] . ', ';
                                }
                            }
                        }
                    }
                }
                if ($error_txt != '') {
                    $error = array('error' => $error_txt.'<br>มีคนแทงมาเกินที่ระบบกำหนดไว้แล้ว<br><b>กรุณาแก้ไขแล้วลองใหม่อีกครั้ง</b>');
                    return response()->json($error, 422);
                }

                // เอาเลขที่บิลนี้มี ไป หาว่าเกิน Limit หรือยัง
                if ($uns_number_in_this_poy) {
                    
                    $error_number_array = array();

                    foreach ($uns_number_in_this_poy as $huay_type => $info) {
                        //ฟิวเตอร์ โพยตัวเองก่อน
                        $field = array('number', 'multiple');
                        $number_list = HuayRoundPoyNumbers::where('huay_round_id', $check->id)->where('huay_type', $huay_type)->whereIn('number', $info['number_list'])->get($field);

                        $total_multiple_by_number_id = array();
                        if ($number_list) {

                            // เก็บทั้งหมดก่อน
                            foreach ($number_list as $number_info) {
                                if (!isset($total_multiple_by_number_id[$number_info->number]))
                                    $total_multiple_by_number_id[$number_info->number] = 0;
                                $total_multiple_by_number_id[$number_info->number] += $number_info->multiple;
                            }

                            
                            // เช็คว่าเล่นเกิน ที่ตั้งไว้ไหม
                            foreach ($number_list as $number_info) {
                                if (($total_multiple_by_number_id[$number_info->number] + $info['play_price'][$number_info->number]) > ($info['uns_info']->max_price - 100) && $info['uns_info']->over_percent == 0)
                                    $error_number_array[$number_info->number] = 1;
                            }
                        }
                    }
                    // เอาเลขที่มีปัญหามาใส่ txt
                    if($error_number_array)
                    {
                        foreach ($error_number_array as $number => $nothing)
                            $error_txt .= $number.',';
                    }
                }
                if ($error_txt != '') {
                    $error = array('error' => $error_txt.'<br>มีคนแทงมาเกินที่ระบบกำหนดไว้แล้ว<br><b>กรุณาแก้ไขแล้วลองใหม่อีกครั้ง</b>');
                    return response()->json($error, 422);
                }

                // สร้างโพย
                $poy = new HuayRoundPoys();
                $poy->name = '';
                $poy->user_id = Auth::user()->id;
                $poy->huay_category_id = $check->huay_category_id;
                $poy->huay_id = $check->huay_id;
                $poy->huay_round_id = $check->id;
                $poy->secret = $request->huay_secret;
                $poy->total_price = $total_price;

                $poy->save();


                DB::table("users")->where('id', Auth::user()->id)->decrement('money', $total_price);

                $tran = new Transactions();
                $tran->user_id = Auth::user()->id;
                $tran->status = 'confirm';
                $tran->direction = 'OUT';
                $tran->type = 'CREDIT';
                $tran->remark = 'จ่ายเงินจากการแทงหวยโพย '.'PY'.sprintf('%04d', $poy->id);
                $tran->amount = $total_price;
                $tran->save();

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
                                $poy_number->huay_price = $check->$huay_type;
                                $poy_number->total_price = ($info['multiple'] * $check->$huay_type);
                                if (isset($uns[$huay_type][$info['number']]))
                                {
                                    $max_uns = ($uns[$huay_type][$info['number']]->max_price - 100);
                                    $total_play = HuayRoundPoyNumbers::where('huay_round_id', $check->id)->where('number', $info['number'])->sum('total_price');

                                    $left_slot = $max_uns - $total_play;
                                    $poy_number->is_un = 1;

                                    if($total_play > $max_uns)
                                    {
                                        $poy_number->total_price  = $info['multiple'] * $uns[$huay_type][$info['number']]->over_percent;
                                        $poy_number->remark_price  = 'เกินจากที่ระบบกำหนดไว้จะได้ '.number_format($info['multiple'], 2).' x '.number_format($uns[$huay_type][$info['number']]->over_percent, 2).' = '.number_format($poy_number->total_price, 2);

                                    }
                                    else if(($total_play + $info['multiple']) <= $max_uns)
                                    {
                                        $poy_number->total_price  = $info['multiple'] * 90;
                                        $poy_number->remark_price  = number_format($info['multiple'], 2).' x 90 = '.number_format($poy_number->total_price);
                                    }
                                    else if($left_slot > 0 && $uns[$huay_type][$info['number']]->over_percent > 0)
                                    {
                                        $over = $info['multiple'] - $left_slot;

                                        $full_price = $left_slot * 90;
                                        $poy_number->total_price  = $full_price;

                                        $over_price = $over * $uns[$huay_type][$info['number']]->over_percent;
                                        $poy_number->total_price  +=  $over_price;

                                        $poy_number->remark_price  = number_format($left_slot, 2).' x 90 = '.number_format($full_price);
                                        $poy_number->remark_price  .= ', เกินจากที่ระบบกำหนดไว้จะได้ '.number_format($over, 2).' x '.number_format($uns[$huay_type][$info['number']]->over_percent).' = '.number_format($over_price);

                                    }
                                }
                                else
                                    $poy_number->remark_price  = number_format($info['multiple'], 2).' x '.number_format($check->$huay_type, 2).' = '.number_format($poy_number->total_price);



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
