@extends('layout.master')

@section('title', 'Tambah Fakultas')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-danger">Tambah Fakultas Baru</h1>

        <form action="{{ url('/fakultas') }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama fakultas">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi fakultas"></textarea>
            </div>

            <div class="mb-3">
                <label for="program" class="form-label">Akreditasi</label>
                <input type="text" class="form-control" id="program" placeholder="Contoh: Akreditasi A">
            </div>

            <button type="submit" class="btn btn-danger">Simpan</button>
        </form>
    </div>
</main>
@endsection
