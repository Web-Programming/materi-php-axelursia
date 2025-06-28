
@extends('layout.master')

@section('title', 'Hapus Dosen')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container text-center">
        <h1 class="mb-4 mt-3 text-danger">Hapus Dosen</h1>
        <p>Apakah Anda yakin ingin menghapus <strong>{{ $dosen['nama'] }}</strong>?</p>

        <form action="{{ route('dosen.delete', $fak['id']) }}" method="POST" style="display: inline;">
            @csrf
            @method('POST') <!-- Jika perlu, tambahkan method ini -->
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Hapus</button>
        </form>


        <a href="{{ url('/dosen') }}" class="btn btn-secondary">Batal</a>
    </div>
</main>
@endsection
