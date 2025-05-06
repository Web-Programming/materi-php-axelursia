<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/profil", function(){
    return view("profil");
});

Route::get("/berita/{id}/{title?}", function($id, $title = NULL){
    return view("berita", ['id' => $id, 'title' => $title]);
});

Route::get("/total/{bil1}/{bil2?}/{bil3?}", 
    function($bil1, $bil2, $bil3 = 0){
    return view("hasil", [
        'total' => $bil1 + $bil2 + $bil3, 
        'bil1' => $bil1, 
        'bil2' => $bil2, 
        'bil3' => $bil3
    ]);
});


Route::get('/materi/index', [MateriController::class, 'index']);

Route::get('/materi/detail/{id}', [MateriController::class, 'detail']);

Route::resource('prodi', ProdiController::class);

Route::apiResource('api/mhs', MhsApiController::class);