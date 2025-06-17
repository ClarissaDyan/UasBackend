@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Penghuni</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-8">
                <form method="GET" action="{{ route('penghuni') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari berdasarkan nama, nomor, kamar, atau masa sewa..." 
                               value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('penghuni') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('penghuni.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>

        <!-- Search Results Info -->
        @if(request('search'))
            <div class="alert alert-info">
                <strong>Hasil pencarian untuk:</strong> "{{ request('search') }}" 
                - {{ $penghuni->total() }} hasil ditemukan
            </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Masa Sewa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penghuni as $phi)
                <tr>
                    <td>{{ $phi->id }}</td>
                    <td>{{ $phi->nama }}</td>
                    <td>{{ $phi->nomor }}</td>
                    <td>{{ $phi->kamar }}</td>
                    <td>{{ $phi->masaSewa }}</td>
                    <td>
                        <a href="{{ route('penghuni.edit', $phi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penghuni.destroy', $phi->id) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        @if(request('search'))
                            Tidak ada penghuni yang ditemukan untuk pencarian "{{ request('search') }}"
                        @else
                            Belum ada data penghuni
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        @if($penghuni->hasPages())
            <div class="d-flex justify-content-center">
                {{ $penghuni->links() }}
            </div>
        @endif
    </div>
</section>
@endsection