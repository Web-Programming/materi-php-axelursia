@extends('layout.master')

@section('title', 'Detail Materi')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-danger">{{ $materi['nama'] }}</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/' . $materi['gambar']) }}" class="img-fluid rounded" alt="{{ $materi['nama'] }}">
            </div>
            <div class="col-md-6 mt-3">
                <h2 class="text-danger">{{ $materi['nama'] }}</h2>
                <p>{{ $materi['deskripsi'] }}</p>

                <!-- Kembali ke daftar Materi -->
                <a href="{{ route('materi.index') }}" class="btn btn-secondary">Kembali ke Daftar Materi</a>

                <!-- Form Hapus (menggunakan method DELETE) -->
                <form action="{{ route('materi.destroy', $materi['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE') <!-- Menggunakan method DELETE untuk penghapusan -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Materi ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
