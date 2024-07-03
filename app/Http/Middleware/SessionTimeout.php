<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
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
        if (Auth::check() && (now()->diffInMinutes(Session::get('lastActivityTime')) > config('session.lifetime'))) {
            Auth::logout();
            return redirect()->route('login')->with('message', 'Your session has expired. Please log in again.');
        }

        Session::put('lastActivityTime', now());

        return $next($request);
    }
}