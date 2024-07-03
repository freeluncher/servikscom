<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

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
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:doctor,patient'],
            'nik' => ['nullable', 'string', 'max:16', 'unique:users'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'nik' => $data['role'] === 'patient' ? $data['nik'] : null,
            'is_approved' => $data['role'] === 'patient' ? true : false,
        ]);
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