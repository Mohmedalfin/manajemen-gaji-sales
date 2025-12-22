<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function showLoginForm()
    {
        // Jika pengguna sudah login, redirect ke dashboard yang sesuai
        if (Auth::check()) {
            $userRole = Auth::user()->role;
            if ($userRole == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($userRole == 'sales') {
                return redirect()->route('sales.dashboard');
            }
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session lama biar benar-benar bersih
        $request->session()->invalidate();

        // Regenerate CSRF token (best practice)
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}