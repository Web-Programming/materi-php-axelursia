@extends('layout.master')

@section('title', 'Universitas MDP')

@section('content')
<main class="app-main" style="background-color: #f73333;">
    <div class="container">
        <h1 class="mb-4 mt-3 text-white">Mahasiswa Universitas Multi Data Palembang</h1>

        @foreach($mahasiswa as $fak)
        <div class="small-box text-bg-light" style="box-shadow: none">
            <div class="inner">
        <div class="row mb-5 fade-in">
            <div class="col-md-6">
                <img src="{{ asset('img/' . $fak['gambar']) }}" class="img-fluid rounded" alt="{{ $fak['nama'] }}">
            </div>
            <div class="col-md-6 mt-3">
                <h2 class="text-danger"><b>{{ $fak['nama'] }}</b></h2>
                <p class="text-dark">{{ $fak['deskripsi'] }}</p>

                <!-- Tombol Detail -->
                <a href="{{ route('mhs.detail', $fak['id']) }}" class="btn btn-primary">Detail</a>

                <!-- Tombol Hapus -->
                <form action="{{ route('mhs.destroy', $fak['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus Mahasiswa ini?')">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach

        <a href="{{ route('mhs.create') }}" class="btn btn-success mb-5">Tambah Mahasiswa</a>
    </div>
</main>
@endsection
