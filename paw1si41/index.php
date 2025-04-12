<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PHP</title>
</head>
<body>
    <?php echo "<hi>Welcome to my first Website with PHP</hi>"; ?>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
    <p>My Name is <?php echo "<b>Axel Ursia</b>"; ?></p>
    <hr/>
    <h4> Menulis Variabel di PHP</h4>
    <?php
        //variabel dinamis
        $nama = "Axel Ursia"; //string
        $umur = 20;
        $laki_laki = true; //boolean
        $saldo = null;
        $hobby = ["Berenang", "Membaca", "Bersepeda"]; //array
        $makanan_fav = array("Nasi Goreng", "Mie Ayam", "Ayam Penyet"); //array
        #ini juga komentar "#"

        //variabel statis
        const PI = 3.14;
        echo "Nilai PI = ". PI; // selain pakai . (titik) juga bisa pakai , (koma)
        echo "<br>";
        echo "Umur = $umur";
        echo "<br>";
        //echo "hobi 1. $hobby[0]";

        //menampilkan nilai array
        foreach ($hobby as $key => $value) {
            echo "Hobi ".($key + 1). " = $value <br>";
        }

        $saldo = 1000; // dollar
        //tampilkan symbol dolar ($) menggunakan echo
        echo "<br>";
        echo "Saldo anda =  \"\$$saldo USD\""; 
    ?>
</body>
</html>
