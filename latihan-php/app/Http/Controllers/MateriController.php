<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  protected $materi = [
        [
            'id' => 1,
            'nama' => 'Materi Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'mhs2n.jpeg',
            'deskripsi' => 'Materi perkuliahan FIKR mencakup:

Struktur Data dan Algoritma,

Basis Data,

Jaringan Komputer,

Pemrograman Web.'
        ],
        [
            'id' => 2,
            'nama' => '\Materi Fakultas Ekonomi & Bisnis',
            'gambar' => 'mhs2.jpg',
            'deskripsi' => 'Materi kuliah di FEB mencakup:

Pengantar Manajemen & Ekonomi,

Manajemen Keuangan dan SDM,

Akuntansi Biaya dan Pajak,

Audit dan Sistem Informasi Akuntansi,

Kewirausahaan.'
        ],
    ];


    public function index()
{
    $materi = [
        [
            'id' => 1,
            'nama' => 'Materi Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'mhs.jpeg',
            'deskripsi' => 'Materi disesuaikan dengan kebutuhan industri dan dikemas dengan metode praktikum langsung serta project-based learning.'
        ],
        [
            'id' => 2,
            'nama' => 'Materi Fakultas Ekonomi & Bisnis',
            'gambar' => 'yayaya.jpg', 
            'deskripsi' => 'Pembelajaran dilengkapi dengan studi kasus nyata, software akuntansi, dan kunjungan industri.

'
        ]
    ];

    return view('Materi.index', compact('materi'));
}

    /**
     * Show the form for creating a new resource.
     */

     public function createForm()
     {
         return view('Materi.create');
     }

    public function create(Request $request)
    {
        $newmateri = [
            'id' => count($this->materi) + 1,
            'nama' => $request->input('nama')
        ];

        array_push($this->materi, $newmateri);

        return redirect()->route('Materi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $materi = null;
        foreach ($this->materi as $materiItem) {
            if ($materiItem['id'] == $id) {
                $materi = $materiItem;
                break;
            }
        }

        if (!$materi) {
            return redirect()->route('Materi.index')->with('error', 'Materi tidak ditemukan');
        }

        return view('Materi.detail', ['materi' => $materi]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID dan hapus dari array
        foreach ($this->materi as $key => $materi) {
            if ($materi['id'] == $id) {
                unset($this->materi[$key]);
                break;
            }
        }

        // Redirect ke halaman fakultas dengan pesan sukses
        return redirect()->route('Materi.index')->with('success', 'Materi berhasil dihapus');
    }
}
