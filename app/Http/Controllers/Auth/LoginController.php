<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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

    public function username()
    {
        return 'username';
    }

    public function adminLogin(Request $request)
    {
        $key = $this->username();
        $redirectTo = config('ingametrade.system').'/dashboard';

        $this->validate($request, [
            $key => 'required|string',
            'password' => 'required|string'
        ]);

        if (\Auth::guard('admin')->attempt([$key => $request->$key, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended($redirectTo);
        }
        return back()
            ->withInput($request->only($key, 'remember'))
            ->withErrors(['login.failed' => 'Invalid Username or Password.']);
    }

    public function logout(Request $request)
    {
        if(\Auth::guard('admin')->check()) {
            $redirect = config('ingametrade.system').'/login';
            \Auth::guard('admin')->logout();
        } else {
            $user = Auth::user();
            if (! is_null($user)) {
                $user->login_status = 0;
                $user->save();
            }
            $redirect = '/';
            $this->guard()->logout();
        }


        $request->session()->flush(); // this method should be called after we ensure that there is no logged in guards left

        $request->session()->regenerate(); //same

        return redirect($redirect);
    }
}
