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

        return view('login');
    }
}