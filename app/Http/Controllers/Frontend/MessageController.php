<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $this->middleware(['auth', 'single.device.login']);
        return view('frontend.message');
    }

}
