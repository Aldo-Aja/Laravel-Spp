<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Siswa extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user->level != 'siswa') {
            return redirect()->intended('login');
        }

        echo "Ini Halaman Siswa";
    }
}