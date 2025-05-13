<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\ProdiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login', ['name' => 'Axel Ursia',
                          'email' => 'axelursia@gmail.com',
                          'alamat' => 'mangkunegara'
]
);
});
Route::get('/berita/{id}/{judul?}', function ($id, $judul = judul) {
    return view('berita', ['id' => $id, 'judul' => $judul]);
});

Route::get('/prodi/index', [ProdiController::class, 'index']);
Route::get('/prodi/create', [ProdiController::class, 'create']);
Route::get('/prodi/welcome', [ProdiController::class, 'index']);
Route::get('/layout/dashboard', [ProdiController::class, 'index']);