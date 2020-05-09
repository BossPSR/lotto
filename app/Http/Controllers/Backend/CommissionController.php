<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function commission_manage()
    {
        return view('backend.commission_huay.manage_commission.manage');
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
