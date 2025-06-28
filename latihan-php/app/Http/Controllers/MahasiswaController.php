<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    // Data dummy mahasiswa
    protected $mahasiswa = [
        [
            'id' => 1,
            'nama' => 'Mahasiswa Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'mahasiswa4.jpeg',
            'deskripsi' => 'Mahasiswa aktif di bidang Informatika, Sistem Informasi, dan Teknik Elektro.'
        ],
        [
            'id' => 2,
            'nama' => 'Mahasiswa Fakultas Ekonomi & Bisnis',
            'gambar' => 'mahasiswa5.jpg',
            'deskripsi' => 'Mahasiswa aktif di bidang Manajemen, Akuntansi, dan Bisnis Digital.'
        ],
    ];

    public function __construct()
    {
        // Middleware untuk memeriksa hak akses
        $this->middleware('auth');
        $this->middleware('checklevel:admin,dosen')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek level user
        $user = Auth::user();

        if ($user->level === 'mahasiswa') {
            return view('mahasiswa.access_denied');
        }

        return view('mahasiswa.index', ['mahasiswa' => $this->mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newMahasiswa = [
            'id' => count($this->mahasiswa) + 1,
            'nama' => $request->input('nama'),
            'gambar' => $request->input('gambar') ?? 'default.jpg',
            'deskripsi' => $request->input('deskripsi')
        ];

        array_push($this->mahasiswa, $newMahasiswa);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = null;
        foreach ($this->mahasiswa as $mhs) {
            if ($mhs['id'] == $id) {
                $mahasiswa = $mhs;
                break;
            }
        }

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan');
        }

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = null;
        foreach ($this->mahasiswa as $mhs) {
            if ($mhs['id'] == $id) {
                $mahasiswa = $mhs;
                break;
            }
        }

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan');
        }

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        foreach ($this->mahasiswa as &$mhs) {
            if ($mhs['id'] == $id) {
                $mhs['nama'] = $request->input('nama');
                $mhs['gambar'] = $request->input('gambar') ?? $mhs['gambar'];
                $mhs['deskripsi'] = $request->input('deskripsi');
                break;
            }
        }

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        foreach ($this->mahasiswa as $key => $mhs) {
            if ($mhs['id'] == $id) {
                unset($this->mahasiswa[$key]);
                break;
            }
        }

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
