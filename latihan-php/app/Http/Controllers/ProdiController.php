<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
protected $prodi = [
        [
            'id' => 1,
            'nama' => 'Prodi Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'jurusan.jpg',
            'deskripsi' => 'Mereka memiliki latar belakang pendidikan magister dan doktor di bidang Informatika, Sistem Informasi, Teknik Elektro, dan bidang terkait lainnya. Selain aktif dalam kegiatan akademik, dosen FIKR juga rutin melakukan riset, publikasi ilmiah, serta terlibat dalam pengembangan sistem teknologi baik di dalam maupun luar kampus.'
        ],
        [
            'id' => 2,
            'nama' => 'Prodi Fakultas Ekonomi & Bisnis',
            'gambar' => 'jurusan.jpg',
            'deskripsi' => 'Mereka tidak hanya mengajar, tetapi juga aktif memberikan pelatihan, seminar kewirausahaan, serta menjadi konsultan bisnis di berbagai lembaga dan UMKM.'
        ],
    ];


    public function index()
{
    $prodi = [
        [
            'id' => 1,
            'nama' => 'Prodi Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'orang.jpg',
            'deskripsi' => 'memiliki beberapa program studi unggulan, yaitu:

Informatika: fokus pada algoritma, pemrograman, kecerdasan buatan, dan rekayasa perangkat lunak.

Sistem Informasi: menggabungkan manajemen dan teknologi untuk membangun sistem informasi bisnis.

Teknik Elektro: mempelajari sistem kelistrikan, robotika, mikrokontroler, dan embedded system.'
        ],
        [
            'id' => 2,
            'nama' => 'Prodi Fakultas Ekonomi & Bisnis',
            'gambar' => 'orang.jpg',  // Menambahkan gambar
            'deskripsi' => 'FEB UMDP memiliki dua program studi:

Manajemen: fokus pada strategi bisnis, pemasaran, SDM, dan keuangan.

Akuntansi: mendalami akuntansi keuangan, audit, perpajakan, dan sistem informasi akuntansi.

'
        ]
    ];

    return view('prodi.index', compact('prodi'));
}

    /**
     * Show the form for creating a new resource.
     */

     public function createForm()
     {
         return view('prodi.create');
     }

    public function create(Request $request)
    {
        $newprodi = [
            'id' => count($this->prodi) + 1,
            'nama' => $request->input('nama')
        ];

        array_push($this->prodi, $newprodi);

        return redirect()->route('prodi.index');
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
        $prodi = null;
        foreach ($this->prodi as $prodiItem) {
            if ($prodiItem['id'] == $id) {
                $prodi = $prodiItem;
                break;
            }
        }

        if (!$prodi) {
            return redirect()->route('prodi.index')->with('error', 'prodi tidak ditemukan');
        }

        return view('prodi.detail', ['prodi' => $prodi]);
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
        foreach ($this->prodi as $key => $prodi) {
            if ($prodi['id'] == $id) {
                unset($this->prodi[$key]);
                break;
            }
        }

        // Redirect ke halaman fakultas dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Fakultas berhasil dihapus');
    }
}
