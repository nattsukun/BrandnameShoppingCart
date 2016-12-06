<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
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

        if (Auth::check() && (Auth::user()->role == "Administrator" || Auth::user()->role == "Manager" || Auth::user()->role == "Accountant" )) {
            return $next($request);
        }else{
            if(Auth::check() && Auth::user()->role == "client"){
                return redirect('/');
            }else{
                return redirect('/administrator/auth/login');
            }
        }

    }
}
