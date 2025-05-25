<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManajemanPenghuniController;
use App\Http\Controllers\PencatatanPembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/penghuni', [ManajemanPenghuniController::class, 'index'])->name('penghuni');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/penghuni/create', [ManajemanPenghuniController::class, 'create'])->name('penghuni.create');
    Route::get('/penghuni/edit/{id}', [ManajemanPenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::post('/penghuni/store', [ManajemanPenghuniController::class, 'store'])->name('penghuni.store');
    Route::put('/penghuni/update/{id}', [ManajemanPenghuniController::class, 'update'])->name('penghuni.update');
    Route::delete('/penghuni/destroy/{id}', [ManajemanPenghuniController::class, 'destroy'])->name('penghuni.destroy');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pencatatan', [PencatatanPembayaranController::class, 'index'])->name('pencatatan');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pencatatan/create', [PencatatanPembayaranController::class, 'create'])->name('pencatatan.create');
    Route::get('/pencatatan/edit/{id}', [PencatatanPembayaranController::class, 'edit'])->name('pencatatan.edit');
    Route::post('/pencatatan/store', [PencatatanPembayaranController::class, 'store'])->name('pencatatan.store');
    Route::put('/pencatatan/update/{id}', [PencatatanPembayaranController::class, 'update'])->name('pencatatan.update');
    Route::delete('/pencatatan/destroy/{id}', [PencatatanPembayaranController::class, 'destroy'])->name('pencatatan.destroy');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
