// resources/views/dashboard.blade.php
@auth
    @if(auth()->user()->level == 'admin')
        <!-- Tampilan admin -->
        @include('dashboard.admin')
    @elseif(auth()->user()->level == 'dosen')
        <!-- Tampilan dosen -->
        @include('dashboard.dosen')
    @elseif(auth()->user()->level == 'mahasiswa')
        <!-- Tampilan mahasiswa -->
        @include('dashboard.mahasiswa')
    @else
        <!-- Tampilan user biasa -->
        @include('dashboard.user')
    @endif
@endauth
