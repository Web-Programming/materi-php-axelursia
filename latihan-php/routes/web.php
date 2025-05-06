<?php

use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return view('beranda',
    [
        'name'=> 'Zanesen',
        'email' => 'Zanesen_2327240066@mhs.mdp.ac.id',
        'alamat'=> 'Lorong Kiecong No 806'
    ]);
});

Route::get('/berita/{id}/{judul?}', function ($id,$judul= null) {
    return view('berita',['id'=> $id,'judul' => $judul]);
});

Route::get('/prodi/index', [ProdiController::class,'index']);