<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDoctorApproval
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'doctor' && !Auth::user()->is_approved) {
            Auth::logout();
            return redirect()->route('login')->with('message', 'Your account is not approved yet. Please, contact your administrator');
        }

        return $next($request);
    }
}