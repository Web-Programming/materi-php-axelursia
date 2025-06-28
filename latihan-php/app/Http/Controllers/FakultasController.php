<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $fakultas = [
        [
            'id' => 1,
            'nama' => 'Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'jurusan.jpg',
            'deskripsi' => 'memiliki komitmen kuat untuk mencetak lulusan yang tidak hanya menguasai teori, tetapi juga memiliki keterampilan praktis yang siap pakai di dunia industri dan teknologi.

Program studi yang ada di bawah FIKR antara lain:

Informatika, Sistem Informasi, Teknik Elektro.

Melalui kurikulum yang selalu diperbarui mengikuti perkembangan teknologi serta didukung dengan fasilitas laboratorium yang lengkap dan dosen berpengalaman, FIKR UMDP menjadi pilihan tepat bagi mahasiswa yang ingin menjadi profesional di bidang teknologi informasi, pengembangan software, dan teknik. Mahasiswa juga dibekali dengan kemampuan soft skills, kewirausahaan, dan pelatihan sertifikasi internasional sebagai bekal menghadapi persaingan global.

'
        ],
        [
            'id' => 2,
            'nama' => 'Fakultas Ekonomi & Bisnis',
            'gambar' => 'jurusan.jpg',
            'deskripsi' => 'FEB UMDP bertujuan untuk mencetak lulusan yang mampu berpikir kritis, analitis, serta memiliki kemampuan kepemimpinan dan kewirausahaan dalam menghadapi tantangan dunia bisnis yang dinamis.

Program studi yang ditawarkan antara lain:
Manajemen, Akuntansi.
FEB UMDP mengintegrasikan teori ekonomi dan praktik bisnis nyata melalui pendekatan pembelajaran aktif, magang di perusahaan, studi kasus, serta kolaborasi dengan mitra industri. Selain itu, mahasiswa juga didorong untuk mengembangkan jiwa wirausaha dan inovasi agar mampu menjadi pelaku bisnis yang mandiri dan profesional di era ekonomi digital saat ini.'
        ],
    ];


    public function index()
{
    $fakultas = [
        [
            'id' => 1,
            'nama' => 'Fakultas Ilmu Komputer & Rekayasa',
            'gambar' => 'orang.jpg',
            'deskripsi' => 'Fakultas Ilmu Komputer dan Rekayasa (FIKR) Universitas MDP merupakan pusat pengembangan pendidikan di bidang teknologi informasi, komputer, dan rekayasa.'
        ],
        [
            'id' => 2,
            'nama' => 'Fakultas Ekonomi & Bisnis',
            'gambar' => 'yayaya.jpg', 
            'deskripsi' => 'Fakultas Ekonomi dan Bisnis (FEB) Universitas MDP merupakan fakultas yang berfokus pada pengembangan ilmu di bidang ekonomi, manajemen, dan akuntansi.'
        ]
    ];

    return view('fakultas.index', compact('fakultas'));
}

    /**
     * Show the form for creating a new resource.
     */

     public function createForm()
     {
         return view('fakultas.create');
     }

    public function create(Request $request)
    {
        $newFakultas = [
            'id' => count($this->fakultas) + 1,
            'nama' => $request->input('nama')
        ];

        array_push($this->fakultas, $newFakultas);

        return redirect()->route('fakultas.index');
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
        $fakultas = null;
        foreach ($this->fakultas as $fakultasItem) {
            if ($fakultasItem['id'] == $id) {
                $fakultas = $fakultasItem;
                break;
            }
        }

        if (!$fakultas) {
            return redirect()->route('fakultas.index')->with('error', 'Fakultas tidak ditemukan');
        }

        return view('fakultas.detail', ['fakultas' => $fakultas]);
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
        foreach ($this->fakultas as $key => $fakultas) {
            if ($fakultas['id'] == $id) {
                unset($this->fakultas[$key]);
                break;
            }
        }

        // Redirect ke halaman fakultas dengan pesan sukses
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus');
    }
}
