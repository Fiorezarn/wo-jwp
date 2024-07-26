<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Exists;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level
        ];

        $emailExists = User::where('email', $request->email)->exists();

        if (!$emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $credentials = $request->only('email', 'password', 'level');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $level = $user->level;

            if ($level == 1) {
                return redirect()->route('home')->with('success', 'Login Berhasil');
            } else {
                return redirect()->route('dashboard')->with('success', 'Login Sebagai admin');
            }
        } else {
            return redirect()->back()->withErrors(['password' => 'Password salah']);
        }
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'name wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.unique' => 'email sudah terdaftar',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 8 karakter',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Register Berhasil');
        } else {
            return redirect()->back()->withErrors(['password' => 'Password salah']);
        }
    }

    public function forgetPasswordPage()
    {
        return view('forget-password');
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
            'checkpassword' => 'required|min:8'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'checkpassword.required' => 'Password konfirmasi wajib diisi',
            'checkpassword.min' => 'Password konfirmasi minimal 8 karakter',
            'checkpassword.same' => 'Password konfirmasi harus sama dengan password'
        ]);
        $checkEmail = User::where('email', $request->email)->exists();
        if (!$checkEmail) {
            return redirect()->back()->withErrors('email', 'Akun anda tidak ditemukan');
        } else {
            User::where('email', $request->email)->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'updated_at' => now()
            ]);
            return redirect()->route('loginPage')->with('password', 'Password berhasil diganti');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage')->with('success', 'Logout Berhasil');
    }
}
