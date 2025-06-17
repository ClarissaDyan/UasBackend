@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Edit Data Riwayat Penghuni</h1>

        <form action="{{ route('riwayat_penghuni.update', $phi->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $phi->nama }}" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $phi->nomor }}" >
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" id="kamar" name="kamar" value="{{ $phi->kamar }}" >
            </div>
           <div class="mb-3">
                <label for="alasan" class="form-label">Alasan Keluar</label>
                <input type="text" class="form-control" id="alasan" name="alasan" value="{{ $phi->alasan }}" >
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $phi->tanggal_masuk }}" >
            </div>
            <div class="mb-3">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="{{ $phi->tanggal_keluar }}" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection