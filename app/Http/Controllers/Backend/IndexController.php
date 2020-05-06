<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class IndexController extends Controller
{
    public function index()
    {

        if (!Auth::check()) {
            return view('backend.login');
        }else{
            return redirect('index_admin');
        }
    }

    public function login_process(Request $request)
    {

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::guest('admins')->attempt(['username' => $username, 'password' => $password]))
        {
            return redirect('index_admin');
        }
        else
        {
            return redirect('/admin/login');
        }
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/admin/login');
    // }

}
