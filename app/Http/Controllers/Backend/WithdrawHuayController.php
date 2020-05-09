<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class WithdrawHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function withdraw_approve()
    {
        return view('backend.withdraw_huay.withdraw_approve.withdraw_approve');
    }

    public function withdraw_list()
    {
        return view('backend.withdraw_huay.withdraw_list.withdraw_list');
    }
}
