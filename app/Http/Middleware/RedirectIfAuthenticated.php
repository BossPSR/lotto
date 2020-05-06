<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);

        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('admin.login');
        }

        if (Auth::guard($guard)->check()) {
            return redirect()->guest(route('index_member'));
        }

        return $next($request);


    }
}
