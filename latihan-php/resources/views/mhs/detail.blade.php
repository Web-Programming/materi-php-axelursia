@extends('layout.master')

@section('title', 'Detail Mahasiswa')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-danger">{{ $mahasiswa['nama'] }}</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/' . $mahasiswa['gambar']) }}" class="img-fluid rounded" alt="{{ $mahasiswa['nama'] }}">
            </div>
            <div class="col-md-6 mt-3">
                <h2 class="text-danger">{{ $mahasiswa['nama'] }}</h2>
                <p>{{ $mahasiswa['deskripsi'] }}</p>

                <!-- Kembali ke daftar Mahasiswa -->
                <a href="{{ route('mhs.index') }}" class="btn btn-secondary">Kembali ke Daftar Mahasiswa</a>

                <!-- Form Hapus (menggunakan method DELETE) -->
                <form action="{{ route('mhs.destroy', $mahasiswa['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE') <!-- Menggunakan method DELETE untuk penghapusan -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Mahasiswa ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
