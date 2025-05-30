@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Tambah Data Riwayat Penghuni</h1>

        <form action="{{ route('riwayat_penghuni.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" class="form-control" id="nomor" name="nomor" required>
            </div>
            <div class="mb-3">
                <label for="kamar" class="form-label">Kamar</label>
                <input type="text" class="form-control" id="kamar" name="kamar" required>
            </div>
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan</label>
                <input type="text" class="form-control" id="alasan" name="alasan" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection 