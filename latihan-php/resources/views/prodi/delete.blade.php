
@extends('layout.master')

@section('title', 'Hapus prodi')

@section('content')
<main class="app-main" style="background-color: #f4f4f4;">
    <div class="container text-center">
        <h1 class="mb-4 mt-3 text-danger">Hapus prodi</h1>
        <p>Apakah Anda yakin ingin menghapus <strong>{{ $prodi['nama'] }}</strong>?</p>

        <form action="{{ route('prodi.delete', $fak['id']) }}" method="POST" style="display: inline;">
            @csrf
            @method('POST') <!-- Jika perlu, tambahkan method ini -->
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus prodi ini?')">Hapus</button>
        </form>


        <a href="{{ url('/prodi') }}" class="btn btn-secondary">Batal</a>
    </div>
</main>
@endsection
