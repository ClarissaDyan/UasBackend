@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Pembayaran Penghuni</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-8">
                <form method="GET" action="{{ route('pembayaran') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari berdasarkan nama, nomor telepon, nomor kamar, atau harga sewa..." 
                               value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('pembayaran') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <!-- Search Results Info -->
        @if(request('search'))
            <div class="alert alert-info">
                <strong>Hasil pencarian untuk:</strong> "{{ request('search') }}" 
                - {{ $pembayaran->total() }} hasil ditemukan
            </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Tanggal Jatuh Tempo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $phi)
                <tr>
                    <td>{{ $phi->id }}</td>
                    <td>{{ $phi->nama }}</td>
                    <td>{{ $phi->nomor }}</td>
                    <td>{{ $phi->kamar }}</td>
                    <td>{{ $phi->hargaSewa }}</td>
                    <td>{{ $phi->tanggal}}</td>
                    <td>{{ $phi->status }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $phi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $phi->id) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection 