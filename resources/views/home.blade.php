@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('/img/bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .welcome-card {
        background-color: rgba(255, 248, 225, 0.95);
        border-radius: 1.5rem;
        padding: 2rem 1.5rem;
        margin: 1.5rem auto;
        max-width: 900px;
        text-align: center;
    }

    .welcome-card h2 {
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
    }

    .welcome-card h3 {
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .welcome-card p {
        margin-bottom: 2rem;
        color: #666;
        font-size: 1rem;
    }

    .menu-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2.5rem;
        margin-top: 1.5rem;
        row-gap: 2rem;
    }

    .menu-button {
        background-color: #f0ad4e;
        width: 120px;
        height: 120px;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 0.8rem;
        text-align: center;
    }

    .menu-button i {
        font-size: 1.8rem;
        margin-bottom: 0.6rem;
    }

    .menu-button span {
        font-size: 0.85rem;
        line-height: 1.1;
    }

    .menu-button:hover {
        background-color: #ec971f;
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        color: #fff;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .menu-grid {
            gap: 2.5rem;
            row-gap: 2.5rem;
        }
        
        .menu-button {
            width: 120px;
            height: 120px;
        }
        
        .welcome-card {
            padding: 2rem 1rem;
            margin: 1rem;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-card">
                <h2>Selamat Datang di</h2>
                <h3>KOS SIYIANI</h3>
                <p>Pilih menu di bawah ini untuk mengelola <u>Kos</u> Anda</p>

                <div class="menu-grid">
                    <a href="/penghuni" class="menu-button">
                        <i class="fas fa-users"></i>
                        <span>Manajemen<br>Penghuni</span>
                    </a>
                    <a href="/pembayaran" class="menu-button">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Pencatatan<br>Pembayaran</span>
                    </a>
                    <a href="/kamarkos" class="menu-button">
                        <i class="fa-solid fa-house-user"></i>
                        <span>Manajemen<br>Kamar Kos</span>
                    </a>
                    <a href="/riwayat_penghuni" class="menu-button">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span>Riwayat<br>Penghuni</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection