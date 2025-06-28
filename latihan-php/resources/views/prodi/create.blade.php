@extends('layout.master')

@section('title', 'Tambah Prodi')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-danger">Tambah Prodi Baru</h1>

        <form action="{{ url('/Prodi') }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Prodi">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi Prodi"></textarea>
            </div>

            <div class="mb-3">
                <label for="program" class="form-label">Nomor Induk Prodi</label>
                <input type="text" class="form-control" id="program" placeholder="Contoh: 2224250012">
            </div>

            <button type="submit" class="btn btn-danger">Simpan</button>
        </form>
    </div>
</main>
@endsection

