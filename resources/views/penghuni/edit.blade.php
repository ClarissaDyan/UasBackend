@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Penghuni</h2>

    <form method="POST" action="{{ route('penghuni.update', $phi->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $phi->nama }}">
        </div>

        <div class="form-group">
            <label for="nomor">Nomor</label>
            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $phi->nomor }}">
        </div>

        <div class="form-group">
            <label for="kamar">Kamar</label>
            <input type="text" class="form-control" id="kamar" name="kamar" value="{{ $phi->kamar }}">
        </div>

        <div class="form-group">
            <label for="masaSewa">Masa Sewa</label>
            <input type="text" class="form-control" id="masaSewa" name="masaSewa" value="{{ $phi->masaSewa }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
