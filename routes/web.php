<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Spp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login Routes
Route::get('/', [Login::class, 'index'])->name('login');
Route::get('/forgot-password', [Login::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [Login::class, 'forgot_password_act'])->name('forgot-password-act');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout'])->name('logout');

// Middleware
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Spp::class);
        Route::get('/pembayaran', [Spp::class, 'index']);
        Route::post('/pembayaran/save', [Spp::class, 'save']);
        Route::delete('/pembayaran/delete/{id}', [Spp::class, 'delete'])->name('pembayaran.delete');
        Route::get('/pembayaran/edit/{id}', [Spp::class, 'edit'])->name('pembayaran.edit');
        Route::put('/pembayaran/update/{id}', [Spp::class, 'update'])->name('pembayaran.update');
    });
    Route::group(['middleware' => ['cekUserLogin:siswa']], function () {
        Route::resource('siswa', Siswa::class);
        Route::get('/siswa', [Siswa::class, 'index']);
    });
});