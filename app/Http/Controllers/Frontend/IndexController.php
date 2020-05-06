<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Auth;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','login_process','register','register_process');
    }
    public function index()
    {
        if (!Auth::check()) {
            return view('frontend.login');
        }else{
            return redirect()->route('index_member');
        }
    }

    public function login_process(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect('index_member');
        }
        else
        {
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
        $this->validate($request,[
            'file_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'tel' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $birthday = $request->input('birthday');
        $email = $request->input('email');
        $tel = $request->input('tel');

        if ($password != $confirm_password) {
            return redirect()->route('register');
        }

        $member = new User;
        $member->username = $username;
        $member->password = bcrypt($confirm_password);
        $member->first_name = $first_name;
        $member->last_name = $last_name;
        $member->birthday = $birthday;
        $member->email = $email;
        $member->tel = $tel;
        $member->save();

        if($request->hasFile('file_name')) {
            $filepath = 'uploads/users/'.$member->id;
            if (!File::exists($filepath)) {
                File::makeDirectory($filepath, 0775, true);
            }

            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $Ext = explode('.', $filename);
            $filename = 'cover_user_'.$member->id.'.'.$Ext[1];
            $file->move($filepath, $filename);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            User::where('id', $member->id)->update(['cover_name' => $filename ,'path_cover' => $filepath."/".$filename ,'cover_extension' => $ext]);

        }

        return redirect()->route('index');


    }

    public function index_member()
    {
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
