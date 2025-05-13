<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $listprodi = Prodi::get();
        return view("prodi.index", ['listprodi' => $listprodi]
        );
    }

        public function create() {
        return view("prodi.create");
    }
}

