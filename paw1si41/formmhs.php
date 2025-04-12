<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
   <h2>//SELF PAGE</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    Mahasiswa :
    <input type="text" name="nama"/><br />
    NPM :
    <input type="text" name="npm"/><br />
    EMAIL :
    <input type="text" name="email"/><br /> 
    <input type="submit" value="Add" />
</form>
<?php
if(isset($_POST)){
    echo "NAMA : <b>".$_POsST['nama']."</b><br />";
    echo "NPM : <b>".$_POST['npm']."</b><br />";
    echo "EMAIL : <b>".$_POST['email']."</b><br />";
}
?>


<hr/>
<h2>//OTHER PAGE</h2>
    <form action="create.php" method="POST">
    Mahasiswa :
    <input type="text" name="nama"/><br />
    <input type="submit" value="Add" />
</form>

    //OTHER PAGE
    <!--<form action="create.php" method="POST">-->
</form>

</body>
</html>
