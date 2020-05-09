<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class UnHuayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.un_huay.huay.huay_un');
    }

    public function un_huay_yeekee()
    {
        return view('backend.un_huay.huay_yeekee.huay_yeekee');
    }

    public function un_huay_yeekee_cf()
    {
        return view('backend.un_huay.huay_yeekee_cf.huay_yeekee_cf');
    }
}
