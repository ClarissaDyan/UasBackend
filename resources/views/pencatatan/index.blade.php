@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h1>Daftar Pembayaran Penghuni</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <a href="{{ route('pencatatan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        
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
                @foreach ($pencatatan as $phi)
                <tr>
                    <td>{{ $phi->id }}</td>
                    <td>{{ $phi->nama }}</td>
                    <td>{{ $phi->nomor }}</td>
                    <td>{{ $phi->kamar }}</td>
                    <td>{{ $phi->hargaSewa }}</td>
                    <td>{{ $phi->tanggal}}</td>
                    <td>{{ $phi->status }}</td>
                    <td>
                        <a href="{{ route('pencatatan.edit', $phi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pencatatan.destroy', $phi->id) }}" method="POST" class="d-inline">
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