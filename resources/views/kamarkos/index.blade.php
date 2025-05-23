@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Kamar Kos</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('kamarkos.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomor Kamar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kamarkos as $kamar)
                <tr>
                    <td>{{ $kamar->id }}</td>
                    <td>{{ $kamar->nomorkamar }}</td>
                    <td>{{ $kamar->status }}</td>
                    <td>{{ $kamar->hargaSewa }}</td>
                    <td>{{ $kamar->fasilitas }}</td>
                    <td>
                        <a href="{{ route('kamarkos.edit', $kamar->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kamarkos.destroy', $kamar->id) }}" method="POST" class="d-inline">
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