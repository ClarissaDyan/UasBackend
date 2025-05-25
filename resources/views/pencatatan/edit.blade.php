@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Edit Data Pencatatan Pembayaran</h1>

        <form action="{{ route('pencatatan.update', $phi->id) }}" method="POST">
            @method('PUT')
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
                <label for="hargaSewa" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control" id="hargaSewa" name="hargaSewa" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection 