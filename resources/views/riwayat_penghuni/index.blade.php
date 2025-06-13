@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Riwayat Penghuni</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Filter -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Filter Riwayat Penghuni</h5>
            </div>
            <div class="card-body">
                <!-- Filter Gabungan -->
                <form method="GET" action="{{ route('riwayat_penghuni') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="filter_tanggal_masuk_dari" class="form-label">Tanggal Masuk Dari:</label>
                            <input type="date" class="form-control" name="filter_tanggal_masuk_dari" 
                                   value="{{ request('filter_tanggal_masuk_dari') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_tanggal_masuk_sampai" class="form-label">Tanggal Masuk Sampai:</label>
                            <input type="date" class="form-control" name="filter_tanggal_masuk_sampai" 
                                   value="{{ request('filter_tanggal_masuk_sampai') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_tanggal_keluar_dari" class="form-label">Tanggal Keluar Dari:</label>
                            <input type="date" class="form-control" name="filter_tanggal_keluar_dari" 
                                   value="{{ request('filter_tanggal_keluar_dari') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_tanggal_keluar_sampai" class="form-label">Tanggal Keluar Sampai:</label>
                            <input type="date" class="form-control" name="filter_tanggal_keluar_sampai" 
                                   value="{{ request('filter_tanggal_keluar_sampai') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('riwayat_penghuni') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>

                <hr>

                <!-- Filter Terpisah -->
                <div class="row">
                    <div class="col-md-6">
                        <h6>Filter Tanggal Masuk Saja</h6>
                        <form method="GET" action="{{ route('riwayat_penghuni.filter_tanggal_masuk') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dari" class="form-label">Dari:</label>
                                    <input type="date" class="form-control" name="dari" value="{{ request('dari') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="sampai" class="form-label">Sampai:</label>
                                    <input type="date" class="form-control" name="sampai" value="{{ request('sampai') }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info mt-2">Filter Tanggal Masuk</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h6>Filter Tanggal Keluar Saja</h6>
                        <form method="GET" action="{{ route('riwayat_penghuni.filter_tanggal_keluar') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dari" class="form-label">Dari:</label>
                                    <input type="date" class="form-control" name="dari" value="{{ request('dari') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="sampai" class="form-label">Sampai:</label>
                                    <input type="date" class="form-control" name="sampai" value="{{ request('sampai') }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning mt-2">Filter Tanggal Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Data -->
        <a href="{{ route('riwayat_penghuni.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Alasan</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayat_penghuni as $phi)
                    <tr>
                        <td>{{ $phi->id }}</td>
                        <td>{{ $phi->nama }}</td>
                        <td>{{ $phi->nomor }}</td>
                        <td>{{ $phi->kamar }}</td>
                        <td>{{ $phi->alasan }}</td>
                        <td>{{ \Carbon\Carbon::parse($phi->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($phi->tanggal_keluar)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('riwayat_penghuni.edit', $phi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('riwayat_penghuni.destroy', $phi->id) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Info jumlah data -->
        <div class="mt-3">
            <small class="text-muted">Total data: {{ $riwayat_penghuni->count() }}</small>
        </div>
    </div>
</section>
@endsection