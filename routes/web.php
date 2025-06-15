<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvakuasiController;

Route::get('/request-evakuasi', [EvakuasiController::class, 'index']);
Route::post('/request-evakuasi', [EvakuasiController::class, 'store'])->name('evakuasi.store');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/homepage', [AdminController::class, 'homepage'])->name('admin.homepage');
Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/status-das', 'admin.das-status')->name('admin.das');
    Route::view('/kelola-pengguna', 'admin.users')->name('admin.users');
});

Route::get('/', function () {
    return view('welcome');
});
