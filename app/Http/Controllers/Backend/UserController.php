<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function approve_user()
    {
        $data = [];
        $data['user'] = User::where('status','รอการตรวจสอบ')->get();
        return view('backend.user_huay.approve_user.approve_user',$data);
    }

    public function list_user()
    {
        return view('backend.user_huay.list_user.list_user');
    }

    public function blacklist_user()
    {
        return view('backend.user_huay.blacklist_user.blacklist_user');
    }
}
