<?php

namespace App\Http\Middleware;

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
        //     return redirect('/home');
        // }

        if ($guard == "company" && Auth::guard($guard)->check()) {
                return redirect('/company');
            }

        if ($guard == "student" && Auth::guard($guard)->check()) {
                return redirect('/student');
            }
        if ($guard == "ngo" && Auth::guard($guard)->check()) {
            return redirect('/ngo');
        }


        return $next($request);
    }
}
