<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CommissionSetting;
use App\Models\Transactions;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{

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
        if (isset($_POST['updateCommissionSetting'])) {
            $data = array(
                'commission_percent' => $request->commission_percent,
                'min_withdraws' => $request->min_withdraws,
            );
            CommissionSetting::where('id', $request->id)->update($data);
            return redirect('admin/commission_manage')->with('message', 'แก้ไขข้อมูลสำเร็จ!')->with('status', 'success');
        }
        else if (isset($_POST['transactionConfirm'])) {
            $data = array(
                'status' => 'confirm',
                'admin_id' => auth()->user()->id,
            );

            // Upload image
            if ($request->hasFile('image')) {
                $filepath = 'uploads/withdraws_credit/';
                if (!File::exists($filepath)) {
                    File::makeDirectory($filepath, 0777, true);
                }

                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = time().'_proof_image_' . $request->id . '.' . $ext;
                $file->move($filepath, $filename);

                $data['proof_image'] = $filepath.'/'.$filename;
            }

            Transactions::where('id', $request->id)
                ->update($data);
            return redirect('admin/commission_approve')->with('message', 'ทำรายการสำเร็จแล้ว!')->with('status', 'success');
        } else if (isset($_POST['transactionReject'])) {
            $data = array(
                'status' => 'reject',
                'admin_id' => auth()->user()->id,
            );
            Transactions::where('id', $request->id)
                ->update($data);
            return redirect('admin/commission_approve')->with('message', 'ปฏิเสธรายการนี้แล้ว!')->with('status', 'success');
        }
        return redirect('admin/commission_manage')->with('message', 'ไม่สำเร็จ!')->with('status', 'error');
    }

    public function commission_manage()
    {
        $setting = CommissionSetting::first();
        return view('backend.commission_huay.manage_commission.manage', ['setting' => $setting]);
    }

    public function commission_credit()
    {
        $transaction_list = Transactions::where('status', 'confirm')->where('type', 'INVITE')->get();

        $user_id_all = [];

        if ($transaction_list) {
            foreach ($transaction_list as $list)
                array_push($user_id_all, $list->user_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            foreach ($transaction_list as $key => $info) {
                $transaction_list[$key]->user_info = isset($user_by_id[$info->user_id]) ? $user_by_id[$info->user_id] : null;
                $transaction_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }

        return view('backend.commission_huay.credit_commission.credit' ,['transaction_lists' =>  $transaction_list]);
    }

    public function commission_approve()
    {
        $transaction_list = Transactions::where('status', 'pending')->where('type', 'CREDIT_WITHDRAW')->get();

        $user_id_all = [];

        if ($transaction_list) {
            foreach ($transaction_list as $list)
                array_push($user_id_all, $list->user_id);

            $user_all = DB::table('users')->whereIn('id', $user_id_all)->get();

            $user_by_id = array();
            if ($user_all) {
                foreach ($user_all as $user)
                    $user_by_id[$user->id] = $user;
            }

            foreach ($transaction_list as $key => $info) {
                $transaction_list[$key]->user_info = isset($user_by_id[$info->user_id]) ? $user_by_id[$info->user_id] : null;
                $transaction_list[$key]->status_name = self::$status_list[$info->status]['html'];
            }
        }

        return view('backend.commission_huay.approve_withdraw.approve' ,['transaction_lists' =>  $transaction_list]);
    }
}
