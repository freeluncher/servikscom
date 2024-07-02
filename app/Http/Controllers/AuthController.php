<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'remember' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Data kredensial untuk autentikasi
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? true : false;

        // Coba login
        if (Auth::attempt($credentials, $remember)) {
            // Autentikasi berhasil, arahkan ke halaman dashboard
            return redirect()->intended('dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate request and register user
    }

    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Send password reset link
    }

    public function reset(Request $request)
    {
        // Handle password reset
    }
}