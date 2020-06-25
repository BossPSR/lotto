<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HuayCategorys;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
use App\Models\Huays;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function post(Request $request)
    {
        function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
        {
            $sort_col = array();
            foreach ($arr as $key => $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }

        if (isset($request->get_huay_rounds)) {
            $rounds = HuayRounds::where('huay_id', $request->huay_id)->get();
            return response()->json($rounds, 200);
        }
        if (isset($request->get_stat_number_by_round_id)) {
            $field = array('number', 'huay_round_poy_id', 'multiple');

            $query = HuayRoundPoyNumbers::query();
            $query->where('huay_round_id', $request->huay_round_id);
            if ($request->huay_type)
                $query->where('huay_type', $request->huay_type);
            $numbers = $query->get($field)->toArray();

            $wrap = array();
            if ($numbers) {
                foreach ($numbers as $data) {
                    $original_data = $data;
                    if (!isset($wrap[$data['number']])) {
                        $data['count'] = 0;
                        $data['poy_list'] = array();
                        $wrap[$data['number']] = $data;
                    }

                    $wrap[$data['number']]['count']++;

                    $poy_no = 'PY' . sprintf('%04d', $data['huay_round_poy_id']);
                    $temp = array();
                    $temp['number_list'] = array();
                    $temp['multiple'] = 0;
                    $temp['poy_code'] = $poy_no;
                    if (!isset($wrap[$data['number']]['poy_list'][$poy_no]))
                        $wrap[$data['number']]['poy_list'][$poy_no] = $temp;

                    $wrap[$data['number']]['poy_list'][$poy_no]['multiple'] += $data['multiple'];
                    array_push($wrap[$data['number']]['poy_list'][$poy_no]['number_list'] , $original_data);
                }
                foreach ($wrap as $number => $list) {
                    $wrap[$number]['poy_list'] = array_values($wrap[$number]['poy_list']);
                    
                    array_sort_by_column($wrap[$number]['poy_list'], 'multiple', SORT_DESC);
                }
            }
            $wrap = array_values($wrap);
            array_sort_by_column($wrap, 'count', SORT_DESC);
            return response()->json($wrap, 200);
        }
    }

    public function index()
    {

        function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
        {
            $sort_col = array();
            foreach ($arr as $key => $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }

        $user_all =  User::get();
        $user_by_id = array();
        if ($user_all) {
            foreach ($user_all as $user) {
                $user_by_id[$user->id] = $user;
            }
        }


        $won_by_user_id = array();
        $play_by_user_id = array();

        $numbers = HuayRoundPoyNumbers::get();

        $stat_by_number = array();
        $stat_number_by_user_id = array();

        if ($numbers) {
            foreach ($numbers as $value) {
                if ($value->is_won == 1) {
                    if (!isset($won_by_user_id[$value->user_id]))
                        $won_by_user_id[$value->user_id] = 0;
                    $won_by_user_id[$value->user_id] += $value->total_price;
                } else if ($value->is_won != 1) {
                    if (!isset($play_by_user_id[$value->user_id]))
                        $play_by_user_id[$value->user_id] = 0;
                    $play_by_user_id[$value->user_id] += $value->multiple;
                }

                if (!isset($stat_by_number[$value->number]))
                    $stat_by_number[$value->number] = 0;

                if (!isset($stat_number_by_user_id[$value->user_id][$value->number]))
                    $stat_number_by_user_id[$value->user_id][$value->number] = 0;

                $stat_by_number[$value->number]++;
                $stat_number_by_user_id[$value->user_id][$value->number]++;
            }
        }
        $user_active =  User::where('status', 'อนุมัติ')->get();

        if ($user_active) {
            foreach ($user_active as $key => $value) {
                $user_active[$key]->won = isset($won_by_user_id[$value->id]) ? $won_by_user_id[$value->id] : 0;
                $user_active[$key]->play = isset($play_by_user_id[$value->id]) ? $play_by_user_id[$value->id] : 0;
            }
        }

        $huay_category = HuayCategorys::where('deleted_at', null)->get();
        $huays = Huays::where('deleted_at', null)->get();

        $huay_by_category_id = array();
        foreach ($huays as $huay) {
            if (!isset($huay_by_category_id[$huay->huay_category_id]))
                $huay_by_category_id[$huay->huay_category_id] = array();

            array_push($huay_by_category_id[$huay->huay_category_id], $huay);
        }

        $data = array(
            'count_user' => User::count(),
            'count_user_pending' => User::where('status', 'รอการตรวจสอบ')->count(),
            'count_user_approved' => User::where('status', 'อนุมัติ')->count(),
            'count_user_reject' => User::where('status', 'แบนสมาชิก')->count(),
            'count_user_ban' => User::where('status', 'แบนสมาชิก')->count(),
            'count_user_blacklist' => User::where('status', 'บัญชีดำ')->count(),
            'total_play' => HuayRoundPoyNumbers::whereIn('is_won', [-1, 0])->sum('multiple'),
            'total_won' => HuayRoundPoyNumbers::where('is_won', 1)->sum('total_price'),
            'total_won_shoot' => HuayRounds::sum('total_won_shoot'),
            'user_approved' => $user_active,
            'stat_number_by_user_id' => $stat_number_by_user_id,
            'stat_by_number' => $stat_by_number,
            'user_by_id' => $user_by_id,
            'huay_category' => $huay_category,
            'huay_by_category_id' => $huay_by_category_id,
        );

        return view('backend.index_admin', $data);
    }
    public function dashboard()
    {

        function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
        {
            $sort_col = array();
            foreach ($arr as $key => $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }

        $user_all =  User::get();
        $user_by_id = array();
        if ($user_all) {
            foreach ($user_all as $user) {
                $user_by_id[$user->id] = $user;
            }
        }


        $won_by_user_id = array();
        $play_by_user_id = array();

        $numbers = HuayRoundPoyNumbers::get();

        $stat_by_number = array();
        $stat_number_by_user_id = array();

        if ($numbers) {
            foreach ($numbers as $value) {
                if ($value->is_won == 1) {
                    if (!isset($won_by_user_id[$value->user_id]))
                        $won_by_user_id[$value->user_id] = 0;
                    $won_by_user_id[$value->user_id] += $value->total_price;
                } else if ($value->is_won != 1) {
                    if (!isset($play_by_user_id[$value->user_id]))
                        $play_by_user_id[$value->user_id] = 0;
                    $play_by_user_id[$value->user_id] += $value->multiple;
                }

                if (!isset($stat_by_number[$value->number]))
                    $stat_by_number[$value->number] = 0;

                if (!isset($stat_number_by_user_id[$value->user_id][$value->number]))
                    $stat_number_by_user_id[$value->user_id][$value->number] = 0;

                $stat_by_number[$value->number]++;
                $stat_number_by_user_id[$value->user_id][$value->number]++;
            }
        }
        $user_active =  User::where('status', 'อนุมัติ')->get();

        if ($user_active) {
            foreach ($user_active as $key => $value) {
                $user_active[$key]->won = isset($won_by_user_id[$value->id]) ? $won_by_user_id[$value->id] : 0;
                $user_active[$key]->play = isset($play_by_user_id[$value->id]) ? $play_by_user_id[$value->id] : 0;
            }
        }

        $huay_category = HuayCategorys::where('deleted_at', null)->get();
        $huays = Huays::where('deleted_at', null)->get();

        $huay_by_category_id = array();
        foreach ($huays as $huay) {
            if (!isset($huay_by_category_id[$huay->huay_category_id]))
                $huay_by_category_id[$huay->huay_category_id] = array();

            array_push($huay_by_category_id[$huay->huay_category_id], $huay);
        }

        $data = array(
            'count_user' => User::count(),
            'count_user_pending' => User::where('status', 'รอการตรวจสอบ')->count(),
            'count_user_approved' => User::where('status', 'อนุมัติ')->count(),
            'count_user_reject' => User::where('status', 'แบนสมาชิก')->count(),
            'count_user_ban' => User::where('status', 'แบนสมาชิก')->count(),
            'count_user_blacklist' => User::where('status', 'บัญชีดำ')->count(),
            'total_play' => HuayRoundPoyNumbers::whereIn('is_won', [-1, 0])->sum('multiple'),
            'total_won' => HuayRoundPoyNumbers::where('is_won', 1)->sum('total_price'),
            'total_won_shoot' => HuayRounds::sum('total_won_shoot'),
            'user_approved' => $user_active,
            'stat_number_by_user_id' => $stat_number_by_user_id,
            'stat_by_number' => $stat_by_number,
            'user_by_id' => $user_by_id,
            'huay_category' => $huay_category,
            'huay_by_category_id' => $huay_by_category_id,
        );

        return view('backend.dashboard', $data);
    }

    public function post_admin(Request $request)
    {
        if (isset($_POST['addAdmins'])) {

            $admin = new Admin();
            $admin->username = $_POST['username'];
            $admin->email = $_POST['email'];
            $admin->status = $_POST['status'];
            $admin->password = Hash::make($_POST['password']);

            $check_username = DB::table('admins')->where('username', $_POST['username'])->where('deleted_at', null)->first();

            if ($check_username)
                return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Username ซ้ำกันได้!')->with('status', 'error');

            $check_email = DB::table('admins')->where('email', $_POST['email'])->where('deleted_at', null)->first();
            if ($check_email)
                return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Email ซ้ำกันได้!')->with('status', 'error');

            // Save the model
            $admin->save();

            return redirect('admin/manage_admin')->with('message', 'เพิ่มข้อมูลสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['editAdmins'])) {
            $data = array(
                'status' => $_POST['status'],
                'email' => $_POST['email'],
            );
            if ($_POST['new_password'])
                $data['password'] = Hash::make($_POST['new_password']);

            if ($_POST['email']) {
                $check_email = DB::table('admins')->where('email', $_POST['email'])->whereNotIn('id', [$_POST['id']])->where('deleted_at', null)->first();
                if ($check_email)
                    return redirect('admin/manage_admin')->with('message', 'เพิ่มไม่สำเร็จคุณไม่สามารถใช้ Email ซ้ำกันได้!')->with('status', 'error');
            }
            $affected = DB::table('admins')
                ->where('id', $_POST['id'])
                ->update($data);

            return redirect('admin/manage_admin')->with('message', 'แก้ไขสำเร็จ!')->with('status', 'success');
        } else if (isset($_POST['deleteAdmins'])) {

            $old = DB::table('admins')
                ->where('id', $_POST['id'])
                ->first();

            $data = array(
                "username" => $old->username . '_delete',
                "email" => $old->email . '_delete',
            );
            $affected = DB::table('admins')
                ->where('id', $_POST['id'])
                ->update($data);

            Admin::where('id', $_POST['id'])
                ->delete();
            return redirect('admin/manage_admin')->with('message', 'ลบสำเร็จ')->with('status', 'success');
        }
        return redirect('admin/manage_admin')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function manage_admin()
    {
        $admins = DB::table('admins')->where('deleted_at', null)->orderBy("status", 'desc')->get();

        return view('backend.manage_admin', ['admins' => $admins]);
    }
}
