<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManajemanPenghuniController;
use App\Http\Controllers\PencatatanPembayaranController;
use App\Http\Controllers\ManajemenKamarKosController;
use App\Http\Controllers\RiwayatPenghuniController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk penghuni yang bisa diakses tanpa auth (untuk melihat daftar)
Route::get('/penghuni', [ManajemanPenghuniController::class, 'index'])->name('penghuni');
Route::get('/penghuni', [ManajemanPenghuniController::class, 'index'])->name('penghuni');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/penghuni/create', [ManajemanPenghuniController::class, 'create'])->name('penghuni.create');
    Route::get('/penghuni/edit/{id}', [ManajemanPenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::post('/penghuni/store', [ManajemanPenghuniController::class, 'store'])->name('penghuni.store');
    Route::put('/penghuni/update/{id}', [ManajemanPenghuniController::class, 'update'])->name('penghuni.update');
    Route::delete('/penghuni/destroy/{id}', [ManajemanPenghuniController::class, 'destroy'])->name('penghuni.destroy');
    Route::get('/penghuni/search', [ManajemanPenghuniController::class, 'search'])->name('penghuni.search');
});
Route::get('/pembayaran', [PencatatanPembayaranController::class, 'index'])->name('pembayaran');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pembayaran/create', [PencatatanPembayaranController::class, 'create'])->name('pembayaran.create');
    Route::get('/pembayaran/edit/{id}', [PencatatanPembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::post('/pembayaran/store', [PencatatanPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::put('/pembayaran/update/{id}', [PencatatanPembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/destroy/{id}', [PencatatanPembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});

//route untuk menajemen kamar kos
Route::get('/kamarkos', [ManajemenKamarKosController::class, 'index'])->name('kamarkos');
Route::group(['middleware' => 'auth'], function () {
    // Route untuk sorting kamar kos
    Route::get('/kamarkos/sort/{direction}', [ManajemenKamarKosController::class, 'sortByNomorKamar'])
    ->name('kamarkos.sort')
    ->where('direction', 'asc|desc');

    // Route untuk CRUD kamar kos
    Route::get('/kamarkos/create', [ManajemenKamarKosController::class, 'create'])->name('kamarkos.create');
    Route::get('/kamarkos/edit/{id}', [ManajemenKamarKosController::class, 'edit'])->name('kamarkos.edit');
    Route::post('/kamarkos/store', [ManajemenKamarKosController::class, 'store'])->name('kamarkos.store');
    Route::put('/kamarkos/update/{id}', [ManajemenKamarKosController::class, 'update'])->name('kamarkos.update');
    Route::delete('/kamarkos/destroy/{id}', [ManajemenKamarKosController::class, 'destroy'])->name('kamarkos.destroy');
});

// Route for Riwayat Penghuni
Route::get('/riwayat_penghuni', [RiwayatPenghuniController::class, 'index'])->name('riwayat_penghuni'); 
Route::group(['middleware' => 'auth'], function () {
    // Routes untuk filter
    Route::get('/riwayat-penghuni/filter-tanggal-masuk', [RiwayatPenghuniController::class, 'filterByTanggalMasuk'])->name('riwayat_penghuni.filter_tanggal_masuk');
    Route::get('/riwayat-penghuni/filter-tanggal-keluar', [RiwayatPenghuniController::class, 'filterByTanggalKeluar'])->name('riwayat_penghuni.filter_tanggal_keluar');
    Route::get('/riwayat_penghuni/create', [RiwayatPenghuniController::class, 'create'])->name('riwayat_penghuni.create');
    Route::get('/riwayat_penghuni/edit/{id}', [RiwayatPenghuniController::class, 'edit'])->name('riwayat_penghuni.edit');
    Route::post('/riwayat_penghuni/store', [RiwayatPenghuniController::class, 'store'])->name('riwayat_penghuni.store');
    Route::put('/riwayat_penghuni/update/{id}', [RiwayatPenghuniController::class, 'update'])->name('riwayat_penghuni.update');
    Route::delete('/riwayat_penghuni/destroy/{id}', [RiwayatPenghuniController::class, 'destroy'])->name('riwayat_penghuni.destroy');
});
