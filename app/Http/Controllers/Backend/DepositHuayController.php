<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposits;
use App\Models\User;
use File;
use Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class DepositHuayController extends Controller
{
    private static $table = 'deposits';
    private static $status_list = array(
        'pending' => array(
            'txt' => 'รอยืนยัน',
            'html' => ' <div class="chip chip-warning">
                <div class="chip-body">
                    <div class="chip-text">รอยืนยัน</div>
                </div>
            </div>'
        ),
        'confirm' => array(
            'txt' => 'อนุมัติ',
            'html' => ' <div class="chip chip-success">
                <div class="chip-body">
                    <div class="chip-text">อนุมัติ</div>
                </div>
            </div>'
        ),
        'reject' => array(
            'txt' => 'ปฏิเสธ',
            'html' => ' <div class="chip chip-danger">
                <div class="chip-body">
                    <div class="chip-text">ปฏิเสธ</div>
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
        if (isset($_POST['depositConfirm'])) {

            $info = DB::table(self::$table)->where('id', $request->id)->first();

            if ($info) {
                $data = array(
                    'status' => 'confirm',
                    'admin_id' => auth()->user()->id,
                );


                DB::table(self::$table)
                    ->where('id', $request->id)
                    ->update($data);

                $user = User::where('id', $info->user_id)->first();
                $update_user = array('money' => ($info->amount+ $user->money));

                User::where('id', $info->user_id)->update($update_user);

                return redirect('admin/deposit_approve')->with('message', 'ทำรายการสำเร็จแล้ว!')->with('status', 'success');
            }
        } else if (isset($_POST['depositReject'])) {
            $data = array(
                'status' => 'reject',
                'admin_id' => auth()->user()->id,
            );
            DB::table(self::$table)
                ->where('id', $request->id)
                ->update($data);
            return redirect('admin/deposit_approve')->with('message', 'ปฏิเสธรายการนี้แล้ว!')->with('status', 'success');
        }
        return redirect('admin/deposit_approve')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function deposit_approve()
    {
        $deposit_list = DB::table(self::$table)->where('deleted_at', null)->where('status', 'pending')->orderBy('id', 'desc')->get();

        $user_id_all = [];

        if ($deposit_list) {
            foreach ($deposit_list as $list)
                array_push($user_id_all, $list->user_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            foreach ($deposit_list as $key => $info) {
                $deposit_list[$key]->user_info = isset($user_by_id[$info->user_id]) ? $user_by_id[$info->user_id] : null;
                $deposit_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }
        return view('backend.deposit_huay.deposit_approve.deposit_approve', ['deposit_lists' => $deposit_list]);
    }

    public function deposit_list()
    {
        $deposit_list = DB::table(self::$table)->where('deleted_at', null)->whereIn('status', ['confirm', 'reject'])->orderBy('id', 'desc')->get();

        $user_id_all = [];
        $admin_id_all = [];

        if ($deposit_list) {
            foreach ($deposit_list as $list) {
                array_push($user_id_all, $list->user_id);
                array_push($admin_id_all, $list->admin_id);
            }

            $user_by_id = array();
            $admin_by_id = array();

            if ($user_id_all) {
                $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();
                if ($user_all) {
                    foreach ($user_all as $user)
                        $user_by_id[$user->id] = $user;
                }
            }

            if ($admin_id_all) {
                $admin_all = DB::table('admins')->whereIn('id', $admin_id_all)->get();
                if ($admin_all) {
                    foreach ($admin_all as $user)
                        $admin_by_id[$user->id] = $user;
                }
            }

            foreach ($deposit_list as $key => $info) {
                $deposit_list[$key]->user_info = isset($user_by_id[$info->user_id]) ? $user_by_id[$info->user_id] : null;
                $deposit_list[$key]->admin_info = isset($admin_by_id[$info->admin_id]) ? $admin_by_id[$info->admin_id] : null;
                $deposit_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }
        return view('backend.deposit_huay.deposit_list.deposit_list', ['deposit_lists' => $deposit_list]);
    }
}
