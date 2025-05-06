<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    function index(){
        return view("prodi.index");
    }
}
