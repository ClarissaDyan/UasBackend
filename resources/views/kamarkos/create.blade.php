@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="tambah">
    <div class="container">
        <h1>Tambah Data Detail Kamar Kos</h1>

        <form action="{{ route('kamarkos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nomorkamar" class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" id="nomorkamar" name="nomorkamar" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hargaSewa" class="form-label">Harga Sewa</label>
                <input type="text" class="form-control" id="hargaSewa" name="hargaSewa" required>
            </div>
            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection 