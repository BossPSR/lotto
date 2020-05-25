<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommissionSetting;
use App\Models\HuayRoundPoys;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LotteryAffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request)
    {
        if (isset($_POST['updateUserBank'])) {
            $user_id = auth()->user()->id;

            $data = array(
                'bank_name' => $_POST['bank_name'],
                'account_no' => $_POST['account_no'],
                'account_name' => $_POST['account_name'],
            );

            DB::table('users')
                ->where('id', $user_id)
                ->update($data);

            return redirect()->route('lottery_affiliate')->with('message', 'คุณได้ตั้งค่าเสร็จสมบูรณ์แล้ว!')->with('status', 'success')->with('page', $_GET['page']);
        } else if (isset($_POST['addWithdraw'])) {
            $user = auth()->user();
            if ($user->credit - $_POST['amount'] >= 0) {
                $withdraw = new Transactions();
                $withdraw->remark = 'ได้ทำการแจ้งถอนรายได้ ' . $_POST['remark'];
                $withdraw->amount = $_POST['amount'];
                $withdraw->user_id = auth()->user()->id;
                $withdraw->bank_name = $user->bank_name;
                $withdraw->account_no = $user->account_no;
                $withdraw->account_name = $user->account_name;
                $withdraw->type = 'CREDIT_WITHDRAW';

                $withdraw->save();

                $data = array(
                    'sort_order_id' => $withdraw->id
                );
                DB::table('withdraws')
                    ->where('id', $withdraw->id)
                    ->update($data);

                if ($withdraw->id) {
                    $data = array('credit' => $user->credit - $_POST['amount']);
                    User::where('id', $user->id)->update($data);
                }

                return redirect()->route('lottery_affiliate')->with('message', 'กรุณารอผู้ดูแลระบบตรวจสอบข้อมูล!')->with('status', 'success');
            }
        }
        return redirect()->route('lottery_affiliate')->with('message', 'เกิดข้อผิดพลาด!')->with('status', 'error');

    }

    public function index()
    {
        $user_info = Auth::user();

        $field = array(
            'id',
            'first_name',
            'last_name',
            'username',
            'path_cover',
        );
        $downlines = User::where('upline_id', Auth::user()->id)->where('status', 'อนุมัติ')->get($field);

        $downline_poy_count = 0;
        if (count($downlines)) {
            $downline_id_all = array();
            foreach ($downlines as $downline)
                array_push($downline_id_all, $downline->id);

            $downline_poy_count = HuayRoundPoys::where('user_id', $downline_id_all)->where('is_my_poy', 0)->count();
        }

        $commission_setting = CommissionSetting::first();

        $total_income_list = Transactions::where('user_id', Auth::user()->id)->where('status', 'confirm')->whereIn('type', ['CREDIT', 'INVITE]'])->get('amount');
        $total_income = 0;
        if($total_income_list)
        {
            foreach($total_income_list as $value)
                $total_income+= $value['amount'];
        }
        $data = array(
            'user_info' => $user_info,
            'downlines' => $downlines,
            'downline_poy_count' => $downline_poy_count,
            'commission_setting' => $commission_setting,
            'total_income' => $total_income
        );
        if (isset($_GET['page']) && $_GET['page'] == 'revenue')
            $data['transactions'] = Transactions::where('user_id', Auth::user()->id)->get();
        return view('frontend.lottery_affiliate', $data);
    }
}
