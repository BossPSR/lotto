<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

        $check_username = DB::table('users')->where('username', $_POST['username'])->first();

        if ($check_username)
            return redirect()->route('register')->with('message', 'Username ถูกใช้ไปแล้ว!')->with('status', 'error');

        $check_email = DB::table('users')->where('email', $_POST['email'])->first();
        if ($check_email)
            return redirect()->route('register')->with('message', 'Email ถูกใช้ไปแล้ว!')->with('status', 'error');

        $check_tel = DB::table('users')->where('tel', $_POST['tel'])->first();
        if ($check_tel)
            return redirect()->route('register')->with('message', 'เบอร์โทรนี้ถูกใช้ไปแล้ว!')->with('status', 'error');


        if ($password != $confirm_password) {
            return redirect()->route('register')->with('message', 'รหัสผ่านไม่ตรงกัน!')->with('status', 'error');
        }

        $member = new User;
        $member->username = $username;
        $member->password = bcrypt($confirm_password);
        $member->first_name = $first_name;
        $member->last_name = $last_name;
        $member->email = $email;
        $member->tel = $tel;
        $upline = DB::table('users')->where('username', $_POST['upline_username'])->first();
        if ($upline)
            $member->upline_id = $upline->id;

        $member->save();

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

        return redirect()->route('index')->with('message', 'สมัครสมาชิกสำเร็จ กรุณารอการตรวจสอบ')->with('status', 'success');;
    }

    public function index_member()
    {
        
        if (Auth::user()->status == "รอการตรวจสอบ") {
            return redirect()->route('logout');
        }
        return view('frontend.index_member');
    }

    public function plus_story()
    {
        return view('frontend.plus_story');
    }

    public function lottery_request_deposit()
    {
        return view('frontend.lottery_request_deposit');
    }

    public function lottery_withdraw()
    {
        return view('frontend.lottery_withdraw');
    }
}
