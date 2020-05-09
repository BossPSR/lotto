<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class DepositHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function deposit_approve()
    {
        return view('backend.deposit_huay.deposit_approve.deposit_approve');
    }

    public function deposit_list()
    {
        return view('backend.deposit_huay.deposit_list.deposit_list');
    }
}
