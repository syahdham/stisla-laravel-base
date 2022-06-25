<?php

use Illuminate\Support\Facades\Route;

Route::view('login', 'auth.login')->name('login');
Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'doLogin'])->name('doLogin');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
});
