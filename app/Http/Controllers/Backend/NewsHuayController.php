<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class NewsHuayController extends Controller
{   
    private static $table = "";
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $contents = DB::table('contents')->get();
        return view('backend.news_huay.huay_news', ['contents' => $contents]);
    }
}
