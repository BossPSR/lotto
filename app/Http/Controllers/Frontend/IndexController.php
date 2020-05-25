<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Models\Deposits;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Withdraws;
use File;
use Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'login_process', 'register', 'register_process');
    }
    public function index()
    {
        if (!Auth::check()) {
            return view('frontend.login');
        } else {
            return redirect()->route('index_member');
        }
    }

    public function lottery_request_deposit_post(Request $request)
    {
        if (isset($_POST['addDeposit'])) {
            $deposit = new Deposits();
            $deposit->amount = $_POST['amount'];
            $deposit->banks_id = $_POST['bank_id'];
            $deposit->user_id = auth()->user()->id;

            $deposit->save();

            $data = array(
                'sort_order_id' => $deposit->id
            );
            // Upload image
            if ($request->hasFile('file_name')) {
                $filepath = 'uploads/deposit/';
                if (!File::exists($filepath)) {
                    File::makeDirectory($filepath, 0775, true);
                }

                $file = $request->file('file_name');
                $filename = $file->getClientOriginalName();
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = time() . '_proof_image_' . $deposit->id . '.' . $ext;
                $file->move($filepath, $filename);

                $data['proof_image'] = $filepath . '/' . $filename;
            }
            DB::table('deposits')
                ->where('id', $deposit->id)
                ->update($data);
            return redirect()->route('index_member')->with('message', 'กรุณารอผู้ดูแลระบบตรวจสอบข้อมูล!')->with('status', 'success');
        }
        return redirect()->route('lottery_request_deposit')->with('message', 'เกิดข้อผิดพลาด!')->with('status', 'error');
    }

    public function lottery_withdraw_post(Request $request)
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

            return redirect()->route('lottery_withdraw')->with('message', 'คุณได้ตั้งค่าเสร็จสมบูรณ์แล้ว!')->with('status', 'success');
        } else if (isset($_POST['addWithdraw'])) {
            $user = auth()->user();
            if ($user->money - $_POST['amount'] >= 0) {
                $withdraw = new Withdraws();
                $withdraw->remark = $_POST['remark'];
                $withdraw->amount = $_POST['amount'];
                $withdraw->user_id = auth()->user()->id;
                $withdraw->bank_name = $user->bank_name;
                $withdraw->account_no = $user->account_no;
                $withdraw->account_name = $user->account_name;

                $withdraw->save();

                $data = array(
                    'sort_order_id' => $withdraw->id
                );
                DB::table('withdraws')
                    ->where('id', $withdraw->id)
                    ->update($data);

                if ($withdraw->id) {
                    $data = array('money' => $user->money - $_POST['amount']);
                    User::where('id', $user->id)->update($data);
                }
                return redirect()->route('index_member')->with('message', 'กรุณารอผู้ดูแลระบบตรวจสอบข้อมูล!')->with('status', 'success');
            }
        }
        return redirect()->route('lottery_withdraw')->with('message', 'เกิดข้อผิดพลาด!')->with('status', 'error');
    }

    public function login_process(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect('index_member');
        } else {
            return redirect()->route('index');
        }
    }

    public function profile_user()
    {
        return view('frontend.profile_user');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function register_process(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $birthday = $request->input('birthday');

        $check_username = DB::table('users')->where('username', $_POST['username'])->first();

        if ($check_username)
            return redirect()->route('register')->with('message', 'Username ถูกใช้ไปแล้ว!')->with('status', 'error')->with('ref_code', $_POST['upline_username']);

        $check_email = DB::table('users')->where('email', $_POST['email'])->first();
        if ($check_email)
            return redirect()->route('register')->with('message', 'Email ถูกใช้ไปแล้ว!')->with('status', 'error')->with('ref_code', $_POST['upline_username']);

        $check_tel = DB::table('users')->where('tel', $_POST['tel'])->first();
        if ($check_tel)
            return redirect()->route('register')->with('message', 'เบอร์โทรนี้ถูกใช้ไปแล้ว!')->with('status', 'error')->with('ref_code', $_POST['upline_username']);


        if ($password != $confirm_password) {
            return redirect()->route('register')->with('message', 'รหัสผ่านไม่ตรงกัน!')->with('status', 'error')->with('ref_code', $_POST['upline_username']);
        }

        $member = new User;
        $member->username = $username;
        $member->password = bcrypt($confirm_password);
        $member->first_name = $first_name;
        $member->last_name = $last_name;
        $member->email = $email;
        $member->tel = $tel;
        $member->birthday = $birthday;
        $upline = DB::table('users')->where('affiliate_code', $_POST['upline_username'])->first();
        if ($upline)
        {
            $member->upline_id = $upline->id;
            $credit_cf = new Transactions();
            $credit_cf->user_id = $upline->id;
            $credit_cf->status = 'confirm';
            $credit_cf->direction = 'IN';
            $credit_cf->type = 'INVITE';
            $credit_cf->remark = 'คุณได้รับ 100 เครดิตจากการเชิญสมาชิก '.$member->username;
            $credit_cf->amount = 100;
            $credit_cf->save();
            
            User::where('id', $upline->id)->update(['credit' => ($upline->credit + 100)]);
        }

        $member->save();

        $data = array('affiliate_code' => md5('afc_' . $member->id . '_' . $member->username . '_' . $member->created_at));
        User::where('id', $member->id)->update($data);

        if ($request->hasFile('file_name')) {
            $filepath = 'uploads/users/' . $member->id;
            if (!File::exists($filepath)) {
                File::makeDirectory($filepath, 0775, true);
            }

            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $Ext = explode('.', $filename);
            $filename = 'cover_user_' . $member->id . '.' . $Ext[1];
            $file->move($filepath, $filename);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            User::where('id', $member->id)->update(['cover_name' => $filename, 'path_cover' => $filepath . "/" . $filename, 'cover_extension' => $ext]);
        }

        return redirect()->route('index')->with('message', 'สมัครสมาชิกสำเร็จ กรุณารอการตรวจสอบ')->with('status', 'success');
    }

    public function index_member()
    {
        if (Auth::user()->status == "รอการตรวจสอบ") {
            Auth::guard()->logout();
            return redirect()->route('index')->with('message', 'กรุณารอการตรวจสอบบัญชีผู้ใช้งาน')->with('status', 'warning');
        }

        $user_info = Auth::user();
        return view('frontend.index_member', ['user_info' => $user_info]);
    }

    public function plus_story()
    {
        return view('frontend.plus_story');
    }

    public function lottery_request_deposit()
    {
        $banks = DB::table("banks")->where('deleted_at', null)->orderBy('sort_order_id', 'asc')->get();
        return view('frontend.lottery_request_deposit', ['banks' => $banks]);
    }

    public function lottery_withdraw()
    {
        $user_info = auth()->user();

        return view('frontend.lottery_withdraw', ['user_info' => $user_info]);
    }
}
