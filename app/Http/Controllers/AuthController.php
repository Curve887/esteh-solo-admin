<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login'); // ini login.blade.php
    }

        public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        // Cek apakah email & password benar
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // regenerate session biar aman dari session fixation
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        // Jika gagal login, kirim pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // bikin register.blade.php kalau mau
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // pakai password_confirmation
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('dashboard');
    }
}


