<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('home');
            }
            return redirect()->route('user.dashboard');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user) {
            $status = Password::broker('users')->sendResetLink(
                ['email' => $email],
                function ($user, string $token) {
                    $user->sendPasswordResetNotification($token);
                }
            );
        } else {
            $admin = Admin::where('email', $email)->first();
            if ($admin) {
                $status = Password::broker('admins')->sendResetLink(
                    ['email' => $email],
                    function ($admin, string $token) {
                        $admin->sendPasswordResetNotification($token);
                    }
                );
            } else {
                return back()->withErrors(['email' => 'Email tidak terdaftar sebagai user atau admin.']);
            }
        }

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $email = $request->input('email');

        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            $status = Password::broker('users')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
            );
        } else {
            $admin = \App\Models\Admin::where('email', $email)->first();
            if ($admin) {
                $status = Password::broker('admins')->reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                    function ($admin) use ($request) {
                        $admin->password = bcrypt($request->password);
                        $admin->save();
                    }
                );
            } else {
                return back()->withErrors(['email' => 'Email tidak ditemukan pada user maupun admin.']);
            }
        }

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        return redirect()->route('auth.login');
    }
}
