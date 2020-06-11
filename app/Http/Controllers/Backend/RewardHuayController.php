<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
use App\Models\HuayRoundShoots;
use App\Models\Transactions;
use File;
use Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class RewardHuayController extends Controller
{
    private static $status_list = array(
        'pending' => array(
            'txt' => 'กำลังดำเนินการ',
            'html' => ' <div class="chip chip-warning">
                <div class="chip-body">
                    <div class="chip-text">กำลังดำเนินการ</div>
                </div>
            </div>'
        ),
        'complete' => array(
            'txt' => 'ประกาศผลแล้ว',
            'html' => ' <div class="chip chip-success">
                <div class="chip-body">
                    <div class="chip-text">ประกาศผลแล้ว</div>
                </div>
            </div>'
        ),
        'cancel' => array(
            'txt' => 'คืนโพย',
            'html' => ' <div class="chip chip-danger">
                <div class="chip-body">
                    <div class="chip-text">คืนโพย</div>
                </div>
            </div>'
        ),
        'close' => array(
            'txt' => 'ปิดรับแทง',
            'html' => ' <div class="chip chip-danger">
                <div class="chip-body">
                    <div class="chip-text">ปิดรับแทง</div>
                </div>
            </div>'
        ),
    );

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($_POST['updateRound'])) {
            $data = array(
                'result_tree_up' => $_POST['result_tree_up'],
                'result_tree_tod' => $_POST['result_tree_tod'],
                'result_tree_front' => $_POST['result_tree_front'],
                'result_tree_down' => $_POST['result_tree_down'],
                'result_two_up' => $_POST['result_two_up'],
                'result_two_down' => $_POST['result_two_down'],
                'result_run_up' => $_POST['result_run_up'],
                'result_run_down' => $_POST['result_run_down'],
                'round_status' => 'complete',
                'is_active' => 0
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);

            self::processHuay($request->id);
            return redirect('admin/reward_huay?category_id=' . $_POST['category_id'] . '&start_date=' . $_POST['start_date'] . '&end_date=' . $_POST['end_date'])->with('message', 'สำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['updateRoundYeekee'])) {

            $data = array(
                'result_tree_up' => $_POST['result_tree_up'],
                'result_tree_tod' => $_POST['result_tree_tod'],
                'result_tree_front' => $_POST['result_tree_front'],
                'result_tree_down' => $_POST['result_tree_down'],
                'result_two_up' => $_POST['result_two_up'],
                'result_two_down' => $_POST['result_two_down'],
                'result_run_up' => $_POST['result_run_up'],
                'price_shoot' => $_POST['price_shoot'],
                'result_run_down' => $_POST['result_run_down'],
                'round_status' => 'complete',
                'is_active' => 0
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);

            self::processHuay($request->id);
            self::processHuayYeeKee($request->id);
            return redirect('admin/reward_huay?category_id=' . $_POST['category_id'] . '&start_date=' . $_POST['start_date'] . '&end_date=' . $_POST['end_date'])->with('message', 'สำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['returnPoys'])) {
        } else if (isset($_POST['on'])) {
            $data = array(
                'is_active' => 1,
                'round_status' => 'pending',
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/reward_huay?category_id=' . $_POST['category_id'] . '&start_date=' . $_POST['start_date'] . '&end_date=' . $_POST['end_date'])->with('message', 'เปิดสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['off'])) {
            $data = array(
                'is_active' => 0,
                'round_status' => 'close',
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);
            return redirect('admin/reward_huay?category_id=' . $_POST['category_id'] . '&start_date=' . $_POST['start_date'] . '&end_date=' . $_POST['end_date'])->with('message', 'ปิดสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['id'])) {
            $data = array(
                'is_active' => 0,
                'round_status' => 'cancel',
            );
            DB::table('huay_rounds')
                ->where('id', $request->id)
                ->update($data);
            self::returnHuay($request->id);
        }
        return redirect('admin/reward_huay')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function index()
    {
        $_GET['category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $_GET['start_date'] = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');
        $_GET['end_date'] = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');
        $_GET['round_status'] = isset($_GET['round_status']) ? $_GET['round_status'] : '';

        $huays = DB::table('huays')
            ->join('huay_categorys', 'huays.huay_category_id', '=', 'huay_categorys.id')
            ->select('huays.*', 'huay_categorys.name as category_name')
            ->get();

        $huay_categorys = DB::table('huay_categorys')
            ->get();

        $query = HuayRounds::query();

        $query = $query->whereBetween('start_datetime', array($_GET['start_date'] . ' 00:00:00', $_GET['end_date'] . ' 23:59:59'));

        if ($_GET['category_id'])
            $query = $query->where('huay_category_id', $_GET['category_id']);

        if ($_GET['round_status'])
            $query = $query->where('round_status', $_GET['round_status']);


        $query = $query->join('huay_categorys', 'huay_rounds.huay_category_id', '=', 'huay_categorys.id');
        $query = $query->select('huay_rounds.*', 'huay_categorys.name as category_name');
        $huay_rounds = $query->get();

        if ($huay_rounds) {
            $huay_round_id_all = array();
            foreach ($huay_rounds as $key => $value)
                array_push($huay_round_id_all, $value->id);

            $shoot_all = HuayRoundShoots::whereIn('huay_round_id', $huay_round_id_all)->OrderBy('id', 'DESC')->get();

            $shoot_by_round_id = array();
            $total_shoot_by_round_id = array();
            $avalable_number_by_round_id = array();
            if ($shoot_all) {
                $sample_tree_array = array();
                for ($i = 0; $i <  1000; $i++)
                    array_push($sample_tree_array, sprintf('%03d', $i));

                $sample_two_array = array();
                for ($i = 0; $i <  100; $i++)
                    array_push($sample_two_array, sprintf('%02d', $i));

                foreach ($shoot_all as $key => $value) {
                    if (!isset($shoot_by_round_id[$value->huay_round_id]))
                        $shoot_by_round_id[$value->huay_round_id] = array();

                    array_push($shoot_by_round_id[$value->huay_round_id], $value);

                    if (!isset($total_shoot_by_round_id[$value->huay_round_id]))
                        $total_shoot_by_round_id[$value->huay_round_id] = 0;

                    $total_shoot_by_round_id[$value->huay_round_id] += $value->number;

                    if (!isset($avalable_number_by_round_id[$value->huay_round_id]))
                        $avalable_number_by_round_id[$value->huay_round_id] = array('three' => $sample_tree_array, 'two' => $sample_two_array);

                    $three = $value->number[(strlen($value->number)) - 3] . $value->number[(strlen($value->number)) - 2] . $value->number[(strlen($value->number)) - 1];

                    if (isset($avalable_number_by_round_id[$value->huay_round_id]['three'][$three + 0]))
                        unset($avalable_number_by_round_id[$value->huay_round_id]['three'][$three + 0]);

                    $two = $value->number[(strlen($value->number)) - 5] . $value->number[(strlen($value->number)) - 4];

                    if (isset($avalable_number_by_round_id[$value->huay_round_id]['two'][$two + 0]))
                        unset($avalable_number_by_round_id[$value->huay_round_id]['two'][$two + 0]);
                }
            }

            foreach ($huay_rounds as $key => $info) {
                $huay_rounds[$key]->status_name = self::$status_list[$info->round_status]['html'];
                if ($info->huay_category_id != 1) {
                    $log = '';
                    $total_shoot = isset($total_shoot_by_round_id[$info->id]) ? $total_shoot_by_round_id[$info->id] : 0;

                    $yeekee_six = 'คำนวนไม่เสร็จเร็จเนื่องจาก ผู้ยิงไม่ถึง 16 คน';
                    $three_up = 'xxx';
                    $two_up = 'xx';
                    $two_down = 'xx';
                    if ($total_shoot && $shoot_by_round_id[$info->id][15]) {
                        $yeekee_six = $total_shoot - intval($shoot_by_round_id[$info->id][15]->number);

                        $yeekee_six = strval($yeekee_six);
                        $three_up = $yeekee_six[(strlen($yeekee_six)) - 3] . $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                        $two_up = $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                        $two_down = $yeekee_six[(strlen($yeekee_six)) - 5] . $yeekee_six[(strlen($yeekee_six)) - 4];
                        $log .= $total_shoot . " - " . intval($shoot_by_round_id[$info->id][15]->number) . " = " . $yeekee_six;
                    }

                    $huay_rounds[$key]->unknow = new stdClass;
                    $huay_rounds[$key]->rand = new stdClass;
                    $huay_rounds[$key]->unknow->log = $log;
                    $huay_rounds[$key]->unknow->yeekee_six = $yeekee_six;
                    $huay_rounds[$key]->unknow->three_up = $three_up;
                    $huay_rounds[$key]->unknow->two_up = $two_up;
                    $huay_rounds[$key]->unknow->two_down = $two_down;

                    $log = '';
                    $yeekee_six = 'คำนวนไม่เสร็จเร็จเนื่องจาก ผู้ยิงไม่ถึง 16 คน';
                    $three_up = 'xxx';
                    $two_up = 'xx';
                    $two_down = 'xx';
                    if ($total_shoot && $shoot_by_round_id[$info->id][15]) {

                        $two = '00';
                        if (!$avalable_number_by_round_id[$info->id]['two'])
                            $two = sprintf('%03d', rand(0, 99));
                        else {
                            $avalable_number_by_round_id[$info->id]['two'] = array_values($avalable_number_by_round_id[$info->id]['two']);
                            $index_rand = rand(0, count($avalable_number_by_round_id[$info->id]['two']));
                            $two = $avalable_number_by_round_id[$info->id]['two'][$index_rand];
                        }

                        $three = '000';
                        if (!$avalable_number_by_round_id[$info->id]['three'])
                            $three = sprintf('%03d', rand(0, 999));
                        else {
                            $avalable_number_by_round_id[$info->id]['three'] = array_values($avalable_number_by_round_id[$info->id]['three']);
                            $index_rand = rand(0, count($avalable_number_by_round_id[$info->id]['three']));
                            $three = $avalable_number_by_round_id[$info->id]['three'][$index_rand];
                        }
                        // $pos_sixteen= intval($shoot_by_round_id[$info->id][15]->number);

                        $yeekee_six = (strval($total_shoot)[0] + 1) . strval($two) . strval($three);

                        $three_up = $yeekee_six[(strlen($yeekee_six)) - 3] . $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                        $two_up = $yeekee_six[(strlen($yeekee_six)) - 2] . $yeekee_six[(strlen($yeekee_six)) - 1];
                        $two_down = $yeekee_six[(strlen($yeekee_six)) - 5] . $yeekee_six[(strlen($yeekee_six)) - 4];
                        $log .= $total_shoot . " - " . intval($shoot_by_round_id[$info->id][15]->number) . " = " . $yeekee_six;
                    }

                    $huay_rounds[$key]->rand->yeekee_six = $yeekee_six;
                    $huay_rounds[$key]->rand->three_up = $three_up;
                    $huay_rounds[$key]->rand->two_up = $two_up;
                    $huay_rounds[$key]->rand->two_down = $two_down;
                }
            }
        }
        $data = array(
            'huay_rounds' => $huay_rounds,
            'huays' => $huays,
            'huay_categorys' => $huay_categorys
        );
        return view('backend.reward_huay.huay.huay_reward', $data);
    }

    private function returnHuay($huay_round_id)
    {
        $result_array = array(
            'result_tree_up' => 'สามตัวบน',
            'result_tree_tod' => 'สามตัวโต้ด',
            'result_tree_front' => 'สามตัวหน้า',
            'result_tree_down' => 'สามตัวล่าง',
            'result_two_up' => 'สองตัวบน',
            'result_two_down' => 'สองตัวล่าง',
            'result_run_up' => 'วิ่งบน',
            'result_run_down' => 'วิ่งล่าง',
        );

        $price_array = array(
            'price_tree_up' => 'สามตัวบน',
            'price_tree_tod' => 'สามตัวโต้ด',
            'price_tree_front' => 'สามตัวหน้า',
            'price_tree_down' => 'สามตัวล่าง',
            'price_two_up' => 'สองตัวบน',
            'price_two_down' => 'สองตัวล่าง',
            'price_run_up' => 'วิ่งบน',
            'price_run_down' => 'วิ่งล่าง',
        );

        $merge_array_huay_type = array(
            'price_tree_up' => 'result_tree_up',
            'price_tree_tod' => 'result_tree_tod',
            'price_tree_front' => 'result_tree_front',
            'price_tree_down' => 'result_tree_down',
            'price_two_up' => 'result_two_up',
            'price_two_down' => 'result_two_down',
            'price_run_up' => 'result_run_up',
            'price_run_down' => 'result_run_down',
        );


        $huay_round = HuayRounds::where('id', $huay_round_id)->first();
        if (!$huay_round)
            return False;


        $field = array('id', 'user_id', 'huay_round_poy_id', 'number', 'total_price', 'is_un', 'huay_type', 'multiple');
        HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->update(['is_won' => 0]);
        $total_play = HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->sum('total_price');

        $number_all = HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->get($field);

        // GROUP BY TYPE
        $number_group_by_type = array();
        if ($number_all) {
            foreach ($number_all as $number) {
                if (!isset($number_group_by_type[$number->huay_type]))
                    $number_group_by_type[$number->huay_type] = array();

                array_push($number_group_by_type[$number->huay_type], $number);
            }
        }

        $total_won = 0; // สำหรับเก็บไว้ ยอดคนชนะ
        $won_id_array = array(); // สำหรับ Update ว่า ชนะ
        $won_info_array = array(); // สำหรับ เอาไปแยกให้ตาม User
        $won_by_user_id = array(); // ชนะแยกตามคน

        if ($number_group_by_type) {
            foreach ($merge_array_huay_type as $huay_type => $answer) {
                if (isset($number_group_by_type[$huay_type])) {
                    foreach ($number_group_by_type[$huay_type] as $index => $number_info) {
                        array_push($won_id_array, $number_info->id);
                        array_push($won_info_array, $number_info);

                        if (!isset($won_by_user_id[$number_info->user_id])) {
                            $won_by_user_id[$number_info->user_id] = array(
                                'user_id' => $number_info->user_id,
                                'description' => 'คุณถูกยกเลิก ' . $huay_round->name . ' รายละเอียด ',
                                'total_price' => 0,
                                'poy_list' => array()
                            );
                        }

                        if (!isset($won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)]))
                            $won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)] = '';

                        // เลขที่ถูก
                        $won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)] .= $price_array[$number_info->huay_type] . ' ' . $number_info->number . ' x ' . $number_info->multiple . ' = ' . number_format($number_info->multiple, 2) . ' บ.';

                        $total_won += $number_info->multiple;
                        $won_by_user_id[$number_info->user_id]['total_price'] += $number_info->multiple;
                    }
                }
            }
        }
        if ($won_by_user_id) {
            foreach ($won_by_user_id as $user_id => $info) {
                // สร้าง Transaction
                $tran = new Transactions();
                $tran->user_id = $user_id;
                $tran->admin_id = Auth::user()->id;
                $tran->status = 'confirm';
                $tran->direction = 'IN';
                $tran->type = 'CREDIT';
                $tran->remark = $info['description'];
                $tran->amount = $info['total_price'];

                foreach ($info['poy_list'] as $poy_name => $description)
                    $tran->remark .= $poy_name.' '.$description . ', ';

                $tran->save();

                // เพิ่มเงิน
                DB::table("users")->where('id', $user_id)->increment('money', $info['total_price']);
            }

            // update ยอดชนะ และแทง
            $data = array(
                'total_play' => 0,
                'total_won' => 0,
            );
            HuayRounds::where('id', $huay_round->id)->update($data);

            // update สถานะว่าโพย
            $data = array(
                'poy_status' => 'cancel',
            );
            HuayRoundPoys::where('huay_round_id', $huay_round_id)->update($data);

            // update ตัวเลขที่ชนะ
            $data = array(
                'is_won' => 0,
            );
            HuayRoundPoyNumbers::whereIn('id', $won_id_array)->update($data);
        }
    }

    private function processHuay($huay_round_id)
    {
        $result_array = array(
            'result_tree_up' => 'สามตัวบน',
            'result_tree_tod' => 'สามตัวโต้ด',
            'result_tree_front' => 'สามตัวหน้า',
            'result_tree_down' => 'สามตัวล่าง',
            'result_two_up' => 'สองตัวบน',
            'result_two_down' => 'สองตัวล่าง',
            'result_run_up' => 'วิ่งบน',
            'result_run_down' => 'วิ่งล่าง',
        );

        $price_array = array(
            'price_tree_up' => 'สามตัวบน',
            'price_tree_tod' => 'สามตัวโต้ด',
            'price_tree_front' => 'สามตัวหน้า',
            'price_tree_down' => 'สามตัวล่าง',
            'price_two_up' => 'สองตัวบน',
            'price_two_down' => 'สองตัวล่าง',
            'price_run_up' => 'วิ่งบน',
            'price_run_down' => 'วิ่งล่าง',
        );

        $merge_array_huay_type = array(
            'price_tree_up' => 'result_tree_up',
            'price_tree_tod' => 'result_tree_tod',
            'price_tree_front' => 'result_tree_front',
            'price_tree_down' => 'result_tree_down',
            'price_two_up' => 'result_two_up',
            'price_two_down' => 'result_two_down',
            'price_run_up' => 'result_run_up',
            'price_run_down' => 'result_run_down',
        );


        $huay_round = HuayRounds::where('id', $huay_round_id)->first();
        if (!$huay_round)
            return False;

        $answer = array(
            $huay_round->result_tree_up,
            $huay_round->result_tree_tod,
            $huay_round->result_tree_front,
            $huay_round->result_tree_down,
            $huay_round->result_two_up,
            $huay_round->result_two_down,
            $huay_round->result_run_up,
            $huay_round->result_run_down,
        );

        $field = array('id', 'user_id', 'huay_round_poy_id', 'number', 'total_price', 'is_un', 'huay_type', 'multiple');
        HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->update(['is_won' => 0]);
        $total_play = HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->sum('total_price');

        $number_all = HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->whereIn('number', $answer)->get($field);

      
        // GROUP BY TYPE
        $number_group_by_type = array();
        if ($number_all) {
            foreach ($number_all as $number) {
                if (!isset($number_group_by_type[$number->huay_type]))
                    $number_group_by_type[$number->huay_type] = array();

                array_push($number_group_by_type[$number->huay_type], $number);
            }
        }

        $total_won = 0; // สำหรับเก็บไว้ ยอดคนชนะ
        $won_id_array = array(); // สำหรับ Update ว่า ชนะ
        $won_info_array = array(); // สำหรับ เอาไปแยกให้ตาม User
        $won_by_user_id = array(); // ชนะแยกตามคน

        if ($number_group_by_type) {
            foreach ($merge_array_huay_type as $huay_type => $answer) {
                if (isset($number_group_by_type[$huay_type])) {
                    foreach ($number_group_by_type[$huay_type] as $index => $number_info) {
                        if ($number_info['number'] == $huay_round->$answer) {
                            array_push($won_id_array, $number_info->id);
                            array_push($won_info_array, $number_info);

                            

                            if (!isset($won_by_user_id[$number_info->user_id])) {
                                $won_by_user_id[$number_info->user_id] = array(
                                    'user_id' => $number_info->user_id,
                                    'description' => 'คุณถูกรางวัล ' . $huay_round->name . ' รายละเอียด ',
                                    'total_price' => 0,
                                    'poy_list' => array()
                                );
                            }

                            if (!isset($won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)]))
                                $won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)] = '';

                            // เลขที่ถูก
                            $won_by_user_id[$number_info->user_id]['poy_list']['PY' . sprintf('%04d', $number_info->huay_round_poy_id)] .= $price_array[$number_info->huay_type] . ' ' . $number_info->number . ' x ' . $number_info->multiple . ' = ' . number_format($number_info->total_price, 2) . ' บ.';

                            $total_won += $number_info->total_price;
                            $won_by_user_id[$number_info->user_id]['total_price'] += $number_info->total_price;
                        }
                    }
                }
            }
        }

        if ($won_by_user_id) {
            foreach ($won_by_user_id as $user_id => $info) {
                // สร้าง Transaction
                $tran = new Transactions();
                $tran->user_id = $user_id;
                $tran->admin_id = Auth::user()->id;
                $tran->status = 'confirm';
                $tran->direction = 'IN';
                $tran->type = 'CREDIT';
                $tran->remark = $info['description'];
                $tran->amount = $info['total_price'];

                foreach ($info['poy_list'] as $poy_name => $description)
                    $tran->remark .= $poy_name.' '.$description . ', ';

                $tran->save();

                // เพิ่มเงิน
                DB::table("users")->where('id', $user_id)->increment('money', $info['total_price']);
            }

            // update ยอดชนะ และแทง
            $data = array(
                'total_play' => $total_play,
                'total_won' => $total_won,
            );
            HuayRounds::where('id', $huay_round->id)->update($data);

            // update สถานะว่าโพย
            $data = array(
                'poy_status' => 'complete',
            );
            HuayRoundPoys::where('huay_round_id', $huay_round_id)->update($data);

            // update ตัวเลขที่ชนะ
            $data = array(
                'is_won' => 1,
            );
            HuayRoundPoyNumbers::whereIn('id', $won_id_array)->update($data);
        }
    }

    private function processHuayYeeKee($huay_round_id)
    {
        $price_array = array(
            'price_tree_up' => 'สามตัวบน',
            // 'price_tree_tod' => 'สามตัวโต้ด',
            // 'price_tree_front' => 'สามตัวหน้า',
            // 'price_tree_down' => 'สามตัวล่าง',
            'price_two_up' => 'สองตัวบน',
            'price_two_down' => 'สองตัวล่าง',
            // 'price_run_up' => 'วิ่งบน',
            // 'price_run_down' => 'วิ่งล่าง',
        );

        $merge_array_huay_type = array(
            'price_tree_up' => 'result_tree_up',
            // 'price_tree_tod' => 'result_tree_tod', 
            // 'price_tree_front' => 'result_tree_front', 
            // 'price_tree_down' => 'result_tree_down', 
            'price_two_up' => 'result_two_up',
            'price_two_down' => 'result_two_down',
            // 'price_run_up' => 'result_run_up', 
            // 'price_run_down' => 'result_run_down', 
        );


        $huay_round = HuayRounds::where('id', $huay_round_id)->first();
        if (!$huay_round)
            return False;

        $answer = array(
            $huay_round->result_tree_up,
            // $huay_round->result_tree_tod,
            // $huay_round->result_tree_front,
            // $huay_round->result_tree_down,
            // $huay_round->result_two_up,
            $huay_round->result_two_down,
            // $huay_round->result_run_up,
            // $huay_round->result_run_down,
        );

        $field = array('id', 'user_id', 'huay_round_poy_id', 'number', 'total_price', 'is_un', 'huay_type', 'multiple');
        HuayRoundPoyNumbers::where('huay_round_id', $huay_round_id)->update(['is_won' => 0]);
        $query = HuayRoundShoots::query();
        foreach ($answer as $word) {
            $query->orWhere('number', 'LIKE', '%' . $word . '%');
        }
        $number_all = $query->where('huay_round_id', $huay_round_id)->get();

        // GROUP BY TYPE
        $won_id_array = array();
        $won_by_user_id = array(); // ชนะแยกตามคน

        $total_won_shoot = 0;
        if ($number_all) {
            foreach ($number_all as $number) {
                $number_group_by_type = array(
                    'price_tree_up' => array(),
                    'price_two_up' => array(),
                    'price_two_down' => array(),
                );
                $nb_st = strval($number->number);

                $price_tree_up = $nb_st[2] . $nb_st[3] . $nb_st[4];
                $price_two_up = $nb_st[3] . $nb_st[4];
                $price_two_down =  $nb_st[0] . $nb_st[1];




                if ($price_tree_up == $huay_round->result_tree_up or $price_two_up == $huay_round->result_two_up or $price_two_down == $huay_round->result_two_down) {
                    // เลขที่ถูก
                    if (!isset($won_by_user_id[$number->user_id])) {
                        $won_by_user_id[$number->user_id] = array(
                            'user_id' => $number->user_id,
                            'description' => 'คุณยิงเลข ' . $huay_round->name . ' ถูก รายละเอียด ',
                            'total_price' => 0,
                            'number_list' => array()
                        );
                    }
                    array_push($won_id_array, $number->id);
                    array_push($won_by_user_id[$number->user_id]['number_list'], $number->number . ' ' . number_format($huay_round->price_shoot, 2) . ' บ.');
                    $total_won_shoot += $huay_round->price_shoot;
                    $won_by_user_id[$number->user_id]['total_price'] += $huay_round->price_shoot;
                }
            }
        }


        if ($won_by_user_id) {
            foreach ($won_by_user_id as $user_id => $info) {
                // สร้าง Transaction
                $tran = new Transactions();
                $tran->user_id = $user_id;
                $tran->admin_id = Auth::user()->id;
                $tran->status = 'confirm';
                $tran->direction = 'IN';
                $tran->type = 'CREDIT';
                $tran->remark = $info['description'];
                $tran->amount = $info['total_price'];

                foreach ($info['number_list'] as $description)
                    $tran->remark .= $description . ', ';

                $tran->save();

                // เพิ่มเงิน
                DB::table("users")->where('id', $user_id)->increment('money', $info['total_price']);
            }

            // update ยอดชนะ และแทง
            $data = array(
                'total_won_shoot' => $total_won_shoot,
            );
            HuayRounds::where('id', $huay_round->id)->update($data);


            // update ตัวเลขที่ชนะ
            $data = array(
                'is_won' => 1,
            );
            HuayRoundShoots::whereIn('id', $won_id_array)->update($data);
        }
    }

    public function reward_huay_yeekee()
    {
        return view('backend.reward_huay.huay_yeekee.huay_yeekee');
    }

    public function reward_huay_yeekee_cf()
    {
        return view('backend.reward_huay.huay_yeekee_cf.huay_yeekee_cf');
    }
}
