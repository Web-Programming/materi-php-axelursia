<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $dosen = [
        [
            'id' => 1,
            'nama' => 'Dosen Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'dosen.jpeg',
            'deskripsi' => 'Mereka memiliki latar belakang pendidikan magister dan doktor di bidang Informatika, Sistem Informasi, Teknik Elektro, dan bidang terkait lainnya. Selain aktif dalam kegiatan akademik, dosen FIKR juga rutin melakukan riset, publikasi ilmiah, serta terlibat dalam pengembangan sistem teknologi baik di dalam maupun luar kampus.'
        ],
        [
            'id' => 2,
            'nama' => 'Dosen Fakultas Ekonomi & Bisnis',
            'gambar' => 'dosen.jpeg',
            'deskripsi' => 'Mereka memiliki latar belakang pendidikan magister dan doktor di bidang Ekonomi & Bisnis, dan juga aktif memberikan pelatihan, seminar kewirausahaan, serta menjadi konsultan bisnis di berbagai lembaga dan UMKM.'
        ],
    ];


    public function index()
{
    $dosen = [
        [
            'id' => 1,
            'nama' => 'Dosen Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'yayaya.jpg',
            'deskripsi' => 'Dosen Fakultas Ilmu Komputer & Rekayasa di Universitas Multi Data Palembang merupakan tenaga pengajar yang berkompeten di bidang teknologi informasi, rekayasa, dan komputer.'
        ],
        [
            'id' => 2,
            'nama' => 'Dosen Fakultas Ekonomi & Bisnis',
            'gambar' => 'orang.jpg',  
            'deskripsi' => 'Dosen Fakultas Ekonomi & Bisnis di Universitas Multi Data Palembang adalah akademisi dan praktisi ekonomi serta bisnis yang memiliki pengalaman dalam bidang manajemen, akuntansi, perpajakan, hingga bisnis digital.'
        ]
    ];

    return view('dosen.index', compact('dosen'));
}

    /**
     * Show the form for creating a new resource.
     */

     public function createForm()
     {
         return view('dosen.create');
     }

    public function create(Request $request)
    {
        $newdosen = [
            'id' => count($this->dosen) + 1,
            'nama' => $request->input('nama')
        ];

        array_push($this->dosen, $newdosen);

        return redirect()->route('dosen.index');
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
        $dosen = null;
        foreach ($this->dosen as $dosenItem) {
            if ($dosenItem['id'] == $id) {
                $dosen = $dosenItem;
                break;
            }
        }

        if (!$dosen) {
            return redirect()->route('dosen.index')->with('error', 'Dosen tidak ditemukan');
        }

        return view('dosen.detail', ['dosen' => $dosen]);
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
        foreach ($this->dosen as $key => $dosen) {
            if ($dosen['id'] == $id) {
                unset($this->dosen[$key]);
                break;
            }
        }

        // Redirect ke halaman fakultas dengan pesan sukses
        return redirect()->route('dosen.index')->with('success', 'Fakultas berhasil dihapus');
    }
}

