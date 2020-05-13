<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use stdClass;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private static $table = 'users';
    private static $status_list = array(
        'รอการตรวจสอบ' => array(
            'txt' => 'รอการตรวจสอบ',
            'html' => ' <div class="chip chip-warning">
                <div class="chip-body">
                    <div class="chip-text">รอการตรวจสอบ</div>
                </div>
            </div>'
        ),
        'อนุมัติ' => array(
            'txt' => 'อนุมัติ',
            'html' => ' <div class="chip chip-success">
                <div class="chip-body">
                    <div class="chip-text">อนุมัติ</div>
                </div>
            </div>'
        ),
        'ไม่อนุมัติ' => array(
            'txt' => 'ไม่อนุมัติ',
            'html' => ' <div class="chip chip-danger">
                <div class="chip-body">
                    <div class="chip-text">ไม่อนุมัติ</div>
                </div>
            </div>'
        ),
        'แบนสมาชิก' => array(
            'txt' => 'แบนสมาชิก',
            'html' => ' <div class="chip chip-warning">
                <div class="chip-body">
                    <div class="chip-text">แบนสมาชิก</div>
                </div>
            </div>'
        ),
        'บัญชีดำ' => array(
            'txt' => 'บัญชีดำ',
            'html' => ' <div class="chip chip-dark">
                <div class="chip-body">
                    <div class="chip-text">บัญชีดำ</div>
                </div>
            </div>'
        ),
    );

    public function post(Request $request)
    {
        if (isset($_POST['userConfirm'])) {
            $data = array(
                'status' => 'อนุมัติ',
                'admin_id' => auth()->user()->id,
            );
            DB::table(self::$table)
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/'.$_POST['page'])->with('message', 'อนุมัติรายการนี้แล้ว!')->with('status', 'success');
        } else if (isset($_POST['userReject'])) {
            $data = array(
                'status' => 'ไม่อนุมัติ',
                'admin_id' => auth()->user()->id,
            );
            DB::table(self::$table)
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/'.$_POST['page'])->with('message', 'ไม่อนุมัติรายการนี้แล้ว!')->with('status', 'success');
        }
        else if (isset($_POST['userBan'])) {
            $data = array(
                'status' => 'แบนสมาชิก',
                'admin_id' => auth()->user()->id,
            );
            DB::table(self::$table)
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/'.$_POST['page'])->with('message', 'เปลี่ยนแปลงรายการนี้เป็น แบนสมาชิก แล้ว!')->with('status', 'success');
        }
        else if (isset($_POST['userBlacklist'])) {
            $data = array(
                'status' => 'บัญชีดำ',
                'admin_id' => auth()->user()->id,
            );
            DB::table(self::$table)
                ->where('id', $request->id)
                ->update($data);

            return redirect('admin/'.$_POST['page'])->with('message', 'เปลี่ยนแปลงรายการนี้เป็น บัญชีดำ แล้ว!')->with('status', 'success');
        }
        return redirect('admin/'.$_POST['page'])->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function approve_user()
    {

        $user_list = DB::table(self::$table)->where('status', 'รอการตรวจสอบ')->get();
        if ($user_list) {
            $user_id_all = array();
            foreach ($user_list as $list)
                array_push($user_id_all, $list->upline_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            $not_found_user = new stdClass;
            $not_found_user->first_name = "ไม่พบผู้ใช้งานนี้แล้ว";
            $not_found_user->last_name = "";
            $not_found_user->username = "";


            foreach ($user_list as $key => $info) {
                $user_list[$key]->upline_info = isset($user_by_id[$info->upline_id]) ? $user_by_id[$info->upline_id] : $not_found_user;
                $user_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }
        return view('backend.user_huay.approve_user.approve_user', ['user_lists' => $user_list]);
    }

    public function list_user()
    {
        $user_list = DB::table(self::$table)->whereIn('status', ['อนุมัติ', 'ไม่อนุมัติ', 'แบนสมาชิก', 'บัญชีดำ'])->get();
        if ($user_list) {
            $user_id_all = array();
            foreach ($user_list as $list)
                array_push($user_id_all, $list->upline_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            $admin_id_all = array();
            foreach ($user_list as $list)
                array_push($admin_id_all, $list->admin_id);

            $admin_all = DB::table('admins')->whereIn('id', $admin_id_all)->get();

            $admin_by_id = array();
            if ($admin_all) {
                foreach ($admin_all as $user)
                    $admin_by_id[$user->id] = $user;
            }

            $not_found_user = new stdClass;
            $not_found_user->first_name = "ไม่พบผู้ใช้งานนี้แล้ว";
            $not_found_user->last_name = "";
            $not_found_user->username = "";


            foreach ($user_list as $key => $info) {
                $user_list[$key]->upline_info = isset($user_by_id[$info->upline_id]) ? $user_by_id[$info->upline_id] : $not_found_user;
                $user_list[$key]->admin_info = isset($admin_by_id[$info->admin_id]) ? $admin_by_id[$info->admin_id] : $not_found_user;
                $user_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }
        return view('backend.user_huay.list_user.list_user', ['user_lists' => $user_list]);
    }

    public function blacklist_user()
    {
        $user_list = DB::table(self::$table)->whereIn('status', ['บัญชีดำ'])->get();
        if ($user_list) {
            $user_id_all = array();
            foreach ($user_list as $list)
                array_push($user_id_all, $list->upline_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            $admin_id_all = array();
            foreach ($user_list as $list)
                array_push($admin_id_all, $list->admin_id);

            $admin_all = DB::table('admins')->whereIn('id', $admin_id_all)->get();

            $admin_by_id = array();
            if ($admin_all) {
                foreach ($admin_all as $user)
                    $admin_by_id[$user->id] = $user;
            }


            $not_found_user = new stdClass;
            $not_found_user->first_name = "ไม่พบผู้ใช้งานนี้แล้ว";
            $not_found_user->last_name = "";
            $not_found_user->username = "";


            foreach ($user_list as $key => $info) {
                $user_list[$key]->upline_info = isset($user_by_id[$info->upline_id]) ? $user_by_id[$info->upline_id] : $not_found_user;
                $user_list[$key]->admin_info = isset($admin_by_id[$info->admin_id]) ? $admin_by_id[$info->admin_id] : $not_found_user;
                $user_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }
        return view('backend.user_huay.blacklist_user.blacklist_user', ['user_lists' => $user_list]);
    }
}
