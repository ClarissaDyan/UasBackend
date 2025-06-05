<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManajemanPenghuniController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk penghuni yang bisa diakses tanpa auth (untuk melihat daftar)
Route::get('/penghuni', [ManajemanPenghuniController::class, 'index'])->name('penghuni');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/penghuni/create', [ManajemanPenghuniController::class, 'create'])->name('penghuni.create');
    Route::get('/penghuni/edit/{id}', [ManajemanPenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::post('/penghuni/store', [ManajemanPenghuniController::class, 'store'])->name('penghuni.store');
    Route::put('/penghuni/update/{id}', [ManajemanPenghuniController::class, 'update'])->name('penghuni.update');
    Route::delete('/penghuni/destroy/{id}', [ManajemanPenghuniController::class, 'destroy'])->name('penghuni.destroy');
    Route::get('/penghuni/search', [ManajemanPenghuniController::class, 'search'])->name('penghuni.search');
});