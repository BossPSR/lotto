<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Models\ContactHeader;
use App\Models\ContentModals;
use App\Models\Deposits;
use App\Models\HuayRoundPoyNumbers;
use App\Models\HuayRoundPoys;
use App\Models\HuayRounds;
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
        $this->middleware(['auth', 'single.device.login'])->except('index', 'login_process', 'register', 'otp', 'otp_confirm','register_process');
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            $huay_rounds = HuayRounds::whereBetween('start_datetime', array(date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')))
                ->join('huay_categorys', 'huay_rounds.huay_category_id', '=', 'huay_categorys.id')
                ->select('huay_rounds.*', 'huay_categorys.name as category_name')
                ->get();

            $huay_round_by_category = array();
            if ($huay_rounds) {
                foreach ($huay_rounds as $round) {
                    if (!isset($huay_round_by_category[$round->category_name]))
                        $huay_round_by_category[$round->category_name] = array();

                    array_push($huay_round_by_category[$round->category_name], $round);
                }
            }

            $data = array(
                'huay_round_by_category' => $huay_round_by_category
            );
            return view('frontend.login', $data);
        } else {
            return redirect()->route('index_member');
        }
    }

    public function lottery_request_deposit_post(Request $request)
    {
        if (isset($_POST['addDeposit'])) {

            if ($_POST['amount'] < 100)
                return redirect()->route('lottery_request_deposit')->with('message', 'กรุณาเติมเงินมากกว่า 100 บาท!')->with('status', 'error');

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
            if (Auth::user()->first_name != $_POST['account_name'] or Auth::user()->last_name != $_POST['account_surname'])
                return redirect()->route('lottery_withdraw')->with('message', 'ไม่สามารถทำรายการได้!')->with('status', 'error');

            $user_id = auth()->user()->id;

            $data = array(
                'bank_name' => $_POST['bank_name'],
                'account_no' => $_POST['account_no'],
                'account_name' => $_POST['account_name'] . ' ' . $_POST['account_surname'],
            );

            DB::table('users')
                ->where('id', $user_id)
                ->update($data);

            return redirect()->route('lottery_withdraw')->with('message', 'คุณได้ตั้งค่าเสร็จสมบูรณ์แล้ว!')->with('status', 'success');
        } else if (isset($_POST['addWithdraw'])) {
            $user = auth()->user();

            $withdraw_count = Withdraws::where('user_id', Auth::user()->id)->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();


            if ($_POST['amount'] < 100)
                return redirect()->route('lottery_withdraw')->with('message', 'ขั้นต่ำในการถอนเงิน คือ 100 บาท!')->with('status', 'error');

            if ($withdraw_count >= 5)
                return redirect()->route('lottery_withdraw')->with('message', 'คุณถอนเกินจำนวนครั้งที่กำหนดแล้ว!')->with('status', 'error');


            $last_poy = HuayRoundPoys::where('user_id', $user->id)->orderBy('id', 'DESC')->first();
            if (!$last_poy)
                return redirect()->route('lottery_withdraw')->with('message', 'คุณยังไม่มีการเล่นในระบบ ยอดที่คุณสามารถถอนได้คือ 50% ของการเล่นล่าสุด')->with('status', 'error');

            if (($last_poy->total_price * 0.5) != $_POST['amount'])
                return redirect()->route('lottery_withdraw')->with('message', 'ยอดที่คุณสามารถถอนได้คือ 50% ของการเล่นล่าสุด คือ ' . number_format(($last_poy->total_price * 0.5), 2) . ' บาท')->with('status', 'error');

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


    public function edit_profile_post(Request $request)
    {
        $data = array();
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['birthday'] = $_POST['birthday'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];

        $user = Auth::user();
        if ($_POST['old_password']) {
            // echo bcrypt($_POST['old_password']);

            if (!Auth::attempt(['username' => $user['username'], 'password' => $_POST['old_password']]))
                return redirect()->route('edit_profile')->with('message', 'รหัสผ่านเดิมคุณไม่ถูกต้อง!')->with('status', 'error');

            Auth::logout();
            $data['password'] = bcrypt($_POST['password']);
        }

        // Upload image
        if ($request->hasFile('file_name')) {
            $filepath = 'uploads/id_card/';
            if (!File::exists($filepath)) {
                File::makeDirectory($filepath, 0775, true);
            }

            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $filename = time() . '_proof_image_' . $user->id . '.' . $ext;
            $file->move($filepath, $filename);

            $data['citizen_image'] = $filepath . '/' . $filename;
        }
        DB::table('users')
            ->where('id', $user->id)
            ->update($data);
        if ($_POST['old_password']) {
            return redirect()->route('index')->with('message', 'แก้ไขข้อมูลสำเร็จ! กรุณา Login อีกครั้ง')->with('status', 'success');
        }

        return redirect()->route('edit_profile')->with('message', 'แก้ไขข้อมูลสำเร็จ!')->with('status', 'success');
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
            return redirect()->route('index')->with('message', 'ไม่สามารถเข้าสู่ระบบได้!')->with('status', 'error');
        }
    }

    public function profile_user()
    {
        return view('frontend.profile_user');
    }

    public function otp()
    {
        return view('frontend.otp');
    }
    public function otp_confirm()
    {
        return view('frontend.otp_confirm');
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
        if ($upline) {
            $member->upline_id = $upline->id;
            $credit_cf = new Transactions();
            $credit_cf->user_id = $upline->id;
            $credit_cf->status = 'confirm';
            $credit_cf->direction = 'IN';
            $credit_cf->type = 'INVITE';
            $credit_cf->remark = 'คุณได้รับ 100 เครดิตจากการเชิญสมาชิก ' . $member->username;
            $credit_cf->amount = 100;
            $credit_cf->save();

            User::where('id', $upline->id)->update(['credit' => ($upline->credit + 100)]);
        }

        $member->save();

        $data = array('affiliate_code' => md5('afc_' . $member->id . '_' . $member->username . '_' . $member->created_at));
        if ($request->hasFile('file_name')) {
            $filepath = 'uploads/id_card/';
            if (!File::exists($filepath)) {
                File::makeDirectory($filepath, 0775, true);
            }

            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $filename = time() . '_proof_image_' . $member->id . '.' . $ext;
            $file->move($filepath, $filename);

            $data['citizen_image'] = $filepath . '/' . $filename;
        }

        User::where('id', $member->id)->update($data);

        return redirect()->route('index')->with('message', 'สมัครสมาชิกสำเร็จ กรุณารอการตรวจสอบ')->with('status', 'success');
    }

    public function index_member()
    {
        if (Auth::user()->status == "รอการตรวจสอบ") {
            Auth::guard()->logout();
            return redirect()->route('index')->with('message', 'กรุณารอการตรวจสอบบัญชีผู้ใช้งาน')->with('status', 'warning');
        }

        $user_info = Auth::user();
        $contact_header = ContactHeader::first();

        $content_modals = array();
        if (Auth::user()->last_content_id)
            $content_modals = ContentModals::where('deleted_at', null)->where('id', '!=', Auth::user())->where('id', '>', Auth::user()->last_content_id)->orderBy('id', 'desc')->first();
        else
            $content_modals = ContentModals::where('deleted_at', null)->orderBy('id', 'desc')->first();

        if ($content_modals) {
            $update = array('last_content_id' => $content_modals->id);
            DB::table("users")->where('id', Auth::user()->id)->update($update);
        }

        return view('frontend.index_member', ['user_info' => $user_info, 'contact_header' => $contact_header, 'content_modal' => $content_modals]);
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
        $withdraw_count = Withdraws::where('user_id', $user_info->id)->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();

        return view('frontend.lottery_withdraw', ['user_info' => $user_info, 'withdraw_count' => $withdraw_count]);
    }

    public function edit_profile()
    {
        return view('frontend.edit_profile');
    }
}
