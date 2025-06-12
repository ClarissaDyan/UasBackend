@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #fff8e1; /* kuning pucat */
    }

    .welcome-card {
        background: #fff3cd; /* kuning pastel */
        border: 1px solid #ffeeba;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .welcome-card h2, .welcome-card h3 {
        color: #b8860b; /* dark goldenrod */
        font-weight: bold;
    }

    .welcome-card p {
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .menu-button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        margin: 0.5rem;
        font-size: 1rem;
        border-radius: 0.75rem;
        color: white;
        background-color: #f0ad4e; /* kuning orange Bootstrap */
        border: none;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .menu-button:hover {
        background-color: #ec971f;
        text-decoration: none;
        color: white;
    }

    .menu-button i {
        margin-right: 0.5rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-card">
                <h2>Selamat Datang di</h2>
                <h3>KOS SIYIANI</h3>
                <p>Pilih menu di bawah ini untuk mengelola <u>Kos</u> Anda</p>

                <div class="d-flex justify-content-center flex-wrap">
                    <a href="/penghuni" class="menu-button">
                        <i class="fas fa-users"></i> Manajemen Penghuni
                    </a>
                    <a href="/pembayaran" class="menu-button">
                        <i class="fas fa-money-check-alt"></i> Pencatatan Pembayaran
                    </a>
                    <a href="/kamarkos" class="menu-button">
                        <i class="fa-solid fa-house-user"></i> Manajemen Kamar Kos
                    </a>
                    <a href="/riwayat_penghuni" class="menu-button">
                        <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Penghuni
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
