<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index() {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level =='siswa') {
                return redirect()->intended('siswa');
            }
        }

        return view('auth.login');
    }

    public function forgot_password(){
        return view('auth.forgot-password');
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level =='siswa') {
                return redirect()->intended('siswa');
            }
        }

        return back()->withErrors([
            'gagal' => 'Maaf Username atau Password anda Salah'
        ])->onlyInput('username');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}