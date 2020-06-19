<?php

namespace App\Http\Middleware;

use Closure;

class SingleDeviceLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $session_id = $request->session()->getID();
        // dd($request->session()->getID());
        if ($user) {
            if ($user && ($user->session_id == $session_id || is_null($user->session_id))) {
                return $next($request);
            } else {
                \Auth::guard()->logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect()->guest(route('index'))->with('message', 'ระบบตรวจพบว่ามีการเข้าสู่ระบบด้วยอุปกรณ์อื่น')->with('status', 'error');
            }
        }
        else
        {
            return $next($request);
        }
    }
}
