<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvakuasiController;

Route::get('/request-evakuasi', [EvakuasiController::class, 'index']);
Route::post('/request-evakuasi', [EvakuasiController::class, 'store'])->name('evakuasi.store');

Route::get('/', function () {
    return view('welcome');
});
