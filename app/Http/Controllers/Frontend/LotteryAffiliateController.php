<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommissionSetting;
use App\Models\HuayRoundPoys;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LotteryAffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_info = Auth::user();

        $field = array(
            'id',
            'first_name',
            'last_name',
            'username',
        );
        $downlines = User::where('upline_id', Auth::user()->id)->where('status', 'อนุมัติ')->get($field);

        $downline_poy_count = 0;
        if ($downlines) {
            $downline_id_all = array();
            foreach ($downlines as $downline)
                array_push($downline_id_all, $downline->id);

            $downline_poy_count = HuayRoundPoys::where('user_id', $downline_id_all)->where('is_my_poy', 0)->count();
        }

        $commission_setting = CommissionSetting::first();

        $data = array(
            'user_info' => $user_info, 
            'downlines' => $downlines, 
            'downline_poy_count' => $downline_poy_count,
            'commission_setting' => $commission_setting
        );
        return view('frontend.lottery_affiliate', $data);
    }
}
