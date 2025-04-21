<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login/index');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/login-proses', 'loginProses')->name('login.proses');
    Route::get('/logout', 'logout')->name('logout');
});


Route::middleware('auth')->group(function(){
    Route::controller(JurusanController::class)->group(function(){
        Route::get('/beranda', 'index')->name('home');
        Route::post('/rekomendasi', 'rekomendasi')->name('rekomendasi');
        Route::get('/hasil-rekomendasi', 'hasilRekomendasi')->name('hasil-rekomendasi');
        Route::get('/detail-rekomendasi/{id}', 'detailRekomendasi')->name('detail-rekomendasi');
    });
});

// Route::get('/beranda', [JurusanController::class, 'index'])->name('home');
// Route::post('/rekomendasi', [JurusanController::class, 'rekomendasi'])->name('rekomendasi');

// Route::get('/hasil-rekomendasi', [JurusanController::class, 'hasilRekomendasi'])->name('hasil-rekomendasi');
// Route::get('/detail-rekomendasi/{id}', [JurusanController::class, 'detailRekomendasi'])->name('detail-rekomendasi');