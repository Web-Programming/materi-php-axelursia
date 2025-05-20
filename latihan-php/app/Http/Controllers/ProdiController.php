<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listprodi = Prodi::all(); //select * from prodis;
        //$listprodi = DB::table("prodis")->get();
        return view("prodi.index", 
            ['listprodi' => $listprodi]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakutas = Fakultas::all();
        return view("prodi.create", [
            'fakultas' => $fakutas
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Form Validation
        $data = $request->validate([
            'kode_prodi' => 'required|min:2|max:2',
            'nama' => 'required|min:5|max:25',
            'fakultas_id'=> 'required',
            'logo' => 'image|mines:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->kode_prodi = $validateData['kode_prodi'];
        //upload logo
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $prodi->logo = $filename;
        }

        $prodi->save();

        //Prodi::create([
          //  'kode_prodi' => $data['kode_prodi'],
        //    'nama'          => $data['nama'],
        //]);      


        //arahkan/pindahkan ke halaman tujuan
        return redirect("prodi")->with("status", "Program Studi berhasil disimpan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodi = Prodi::find($id);
        if(!isset($prodi->id)){
            return redirect("prodi")->with("failed", "Program Studi tidak ditemukan!");
        }
        return view("prodi.detail", [
            'prodi' => $prodi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Ambil data berdasarkan id
        $prodi = Prodi::find($id); 
        if(!isset($prodi->id)){
            return redirect("prodi")->with("failed", "Program Studi tidak ditemukan!");
        }

        //select * from prodis where id = $id
        //kirma data ke view
        return view("prodi.edit", [
            'prodi' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Form Validation
        $data = $request->validate([
            //'kode_prodi' => 'required|min:2|max:2',
            'nama' => 'required|min:5|max:25'
        ]);
        //update data
        $prodi = Prodi::find($id);
        //$prodi->kode_prodi = $data['kode_prodi'];
        $prodi->nama = $data['nama'];
        $prodi->save();

        return redirect("prodi")
            ->with("status", "Program Studi berhasil diupdate!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::find($id);

        if(isset($prodi->id)){
            $prodi->delete();
            return redirect("prodi")->with("status", "Program Studi berhasil dihapus!");
        }

        return redirect("prodi")->with("failed", "Program Studi ini gagal dihapus!");

    }
}
