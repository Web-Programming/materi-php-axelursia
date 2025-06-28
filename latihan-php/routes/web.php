<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MhsApiController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;


Route::get('/', function () {
    return view('welcome');
});


//Route::get("/profil", function() {
   // return view("profil");
//});

//Route::get("/berita/{id}/{title?}", function($id, $title = NULL) {
    //return view("berita", ['id' => $id, 'title' => $title]);
//});

Route :: apiResource(name: 'api/mhs',
controller: MhsApiController::class);

Route::resource('materi', MateriController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('fakultas', FakultasController::class);
Route::resource('mhs', MahasiswaController::class);
Route::resource('dosen', DosenController::class);

//Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');

Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mhs.index');
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
// Route::resource('prodi', App\Http\Controllers\ProdiController::class);

// Route::get('.route/create', [Mhs.Controller::class, 'create'])->name('footer.create');


// routes/web.php


// Route untuk prodi
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/prodi/{id}/detail', [ProdiController::class, 'detail'])->name('prodi.detail');
Route::get('/prodi/create', [ProdiController::class, 'createForm'])->name('prodi.create');
Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
Route::post('/prodi/{id}/destroy', [ProdiController::class, 'destroy'])->name('prodi.destroy');  // Menggunakan destroy

//route fakultas
Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
Route::get('/fakultas/{id}/detail', [FakultasController::class, 'detail'])->name('fakultas.detail');
Route::get('/fakultas/create', [FakultasController::class, 'createForm'])->name('fakultas.create');
Route::post('/fakultas/store', [FakultasController::class, 'store'])->name('fakultas.store');
Route::post('/fakultas/{id}/destroy', [FakultasController::class, 'destroy'])->name('fakultas.destroy');  // Menggunakan destroy

//route dosen
Route::get('/dosen', [dosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen/{id}/detail', [dosenController::class, 'detail'])->name('dosen.detail');
Route::get('/dosen/create', [dosenController::class, 'createForm'])->name('dosen.create');
Route::post('/dosen/store', [dosenController::class, 'store'])->name('dosen.store');
Route::post('/dosen/{id}/destroy', [dosenController::class, 'destroy'])->name('dosen.destroy');  // Menggunakan destroy

//route Mahasiswa
Route::get('/mahasiswa', [mahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/{id}/detail', [mahasiswaController::class, 'detail'])->name('mhs.detail');
Route::get('/mahasiswa/create', [mahasiswaController::class, 'createForm'])->name('mhs.create');
Route::post('/mahasiswa/store', [mahasiswaController::class, 'store'])->name('mhs.store');
Route::post('/mahasiswa/{id}/destroy', [mahasiswaController::class, 'destroy'])->name('mhs.destroy');  // Menggunakan destroy

//route Materi
Route::get('/materi', [materiController::class, 'index'])->name('materi.index');
Route::get('/materi/{id}/detail', [materiController::class, 'detail'])->name('Materi.detail');
Route::get('/materi/create', [materiController::class, 'createForm'])->name('Materi.create');
Route::post('/materi/store', [materiController::class, 'store'])->name('Materi.store');
Route::post('/materi/{id}/destroy', [materiController::class, 'destroy'])->name('Materi.destroy');  // Menggunakan destroy

Route::get('/test', function() {
    return "Ini test route!";
});

// // Authentication
// Route::get('/login', [AuthController::class, 'showLogin']);
// Route::post('/login', [AuthController::class, 'do_login']);

// Route::get('/register', [AuthController::class, 'showRegister']);
// Route::post('/register', [AuthController::class, 'do_register']);
// Route::get('/', function () {
//     return view('home');
// })->name('layout.home');
// routes/web.php

Route::middleware(['auth'])->group(function () {
    // Dashboard umum
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin routes
    Route::middleware(['checklevel:admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('dosen', DosenController::class);
        Route::resource('materi', MateriController::class);
    });

    // Dosen routes
    Route::middleware(['checklevel:dosen'])->group(function () {
        Route::resource('materi', MateriController::class)->except(['destroy']);
        Route::resource('mahasiswa', MahasiswaController::class)->only(['index', 'show']);
    });

    // Mahasiswa routes
    Route::middleware(['checklevel:mahasiswa'])->group(function () {
        Route::resource('materi', MateriController::class)->only(['index', 'show']);
    });

    // User routes (only dashboard)
    Route::middleware(['checklevel:user'])->group(function () {
        // Hanya dashboard yang bisa diakses
    });
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'do_register']);
