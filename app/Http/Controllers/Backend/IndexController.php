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

}
