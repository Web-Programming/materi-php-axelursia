<?php

//Cara penulisan class Mobil
class Mobil{

    //Cara penulisan property
    public $warna;
    public $merk;

    //Cara penulisan method
    function maju() {
    // isi method maju()
        return "Mobil maju";
    }
    
    function berhenti() {
    // isi method berhenti()
        return "Mobil berhenti";
    }
}

//buat object dari class Mobil (instansiasi)
$mobil_axel = new Mobil();

// set property
$mobil_axel->warna = "Merah";
$mobil_axel->merk = "Lamborghini";

// tampilkan property
echo "Mobil axel";
echo "<br>Warna : ". $mobil_axel->warna;
echo "<br>Merk : ". $mobil_axel->merk;
echo "<br>";

// tampilkan method
echo $mobil_axel->maju();
echo "<br>";
echo $mobil_axel->berhenti();
?>    
