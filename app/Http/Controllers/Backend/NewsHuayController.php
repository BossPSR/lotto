<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use File;
use Auth;

class NewsHuayController extends Controller
{
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
