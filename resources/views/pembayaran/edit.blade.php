@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Edit Data Pencatatan Pembayaran</h1>

        <form action="{{ route('pembayaran.update', $phi->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $phi->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $phi->nomor }}" required>
            </div>
            <div class="mb-3">
                <label for="kamar" class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" id="kamar" name="kamar" value="{{ $phi->kamar }}" required>
            </div>
            <div class="mb-3">
                <label for="hargaSewa" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control" id="hargaSewa" name="hargaSewa" value="{{ $phi->hargaSewa }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $phi->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" value="{{ $phi->status }}" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection 