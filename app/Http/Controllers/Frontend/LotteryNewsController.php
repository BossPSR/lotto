<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LotteryNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = DB::table("contents")->where("deleted_at", null)->orderBy("sort_order_id", 'ASC')->get();
        return view('frontend.lottery_news', ['contents' => $contents]);
    }
}
