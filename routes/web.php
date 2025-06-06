<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManajemanPenghuniController;
use App\Http\Controllers\PencatatanPembayaranController;

Route::get('/', function () {
    return view('home');
});

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

Route::get('/pembayaran', [PencatatanPembayaranController::class, 'index'])->name('pembayaran');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pembayaran/create', [PencatatanPembayaranController::class, 'create'])->name('pembayaran.create');
    Route::get('/pembayaran/edit/{id}', [PencatatanPembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::post('/pembayaran/store', [PencatatanPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::put('/pembayaran/update/{id}', [PencatatanPembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/destroy/{id}', [PencatatanPembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});
