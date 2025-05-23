@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Tambah Data Penghuni</h1>

        <form action="{{ route('penghuni.store') }}" method="POST">
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
                <label for="masaSewa" class="form-label">Masa Sewa</label>
                <input type="text" class="form-control" id="masaSewa" name="masaSewa" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection 