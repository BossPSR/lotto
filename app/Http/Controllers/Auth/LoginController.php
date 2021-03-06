<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    function authenticated(Request $request, $user)
    {
        $user->update([
            'session_id' => $request->session()->getID()
        ]);
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index_member';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    

    public function login(Request $request)
    {
        $key = $this->username();

        $this->validate($request, [
            $key => 'required|string',
            'password' => 'required|string'
        ]);


        if (Auth::guard('user')->attempt([$key => $request->$key, 'password' => $request->password])) {

            $update_user = array('session_id' => $request->session()->getID());
            User::where('id', Auth::user()->id)
            ->update($update_user);

            return redirect()->route('index_member');
        } else {
            return redirect()->route('index')->with('message', 'ไม่สามารถเข้าสู่ระบบได้!')->with('status', 'error');
        }
    }

    public function username()
    {
        return 'username';
    }

    public function showAdminLoginForm()
    {
        return view('backend.login');
    }

    public function adminLogin(Request $request)
    {
        $key = $this->username();

        $this->validate($request, [
            $key => 'required|string',
            'password' => 'required|string'
        ]);

        if (\Auth::guard('admin')->attempt([$key => $request->$key, 'password' => $request->password])) {
            return redirect('/admin/index_admin');
        }
        return back()
            ->withInput($request->only($key, 'remember'))
            ->withErrors(['login.failed' => 'Invalid Username or Password.']);
    }

    public function logout(Request $request)
    {
        if(Auth::guard('admin')->check()) {
            $redirect = '/admin/login';
            Auth::guard('admin')->logout();
        } else {

            $redirect = '/';
            $this->guard()->logout();
        }


        $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left

        $request->session()->regenerate(); //same

        return redirect($redirect);
    }
}
