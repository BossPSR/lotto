<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\CommissionSetting;
use File;
use Auth;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function post(Request $request)
    {
        if (isset($_POST['updateCommissionSetting'])) {
            $data = array(
                'commission_percent' => $request->commission_percent,
                'max_withdraws' => $request->max_withdraws,
            );
            CommissionSetting::where('id', $request->id)->update($data);
            return redirect('admin/commission_manage')->with('message', 'แก้ไขข้อมูลสำเร็จ!')->with('status', 'success');
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
        return view('backend.commission_huay.credit_commission.credit');
    }

    public function commission_approve()
    {
        return view('backend.commission_huay.approve_withdraw.approve');
    }
}
