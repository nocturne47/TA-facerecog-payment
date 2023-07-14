<?php
require 'functions.php';
if(isset($_COOKIE['id'])){
    $id=$_COOKIE['id'];
    $login=query("SELECT username FROM nasabah WHERE id=$id")[0]['username'];
}else{
    header("Location: salken.php");
    exit;
}



if(isset($_GET['id'])){
    $data=file_get_contents('http://127.0.0.1:8080/label');
// $data1=json_decode($data);
    $data=json_decode($data, true);
    $nama=$data['name'];
    setcookie('name', $nama, time()+15*60);
    setcookie('login', $login, time()+15*60);
    if($nama!=$login){
        header("Location: salken.php");
        exit;
    }
    // setcookie('name', $nama, time()+15*60);
    $nama = ($nama!='N/A') ? $nama : 'Undefined';
    // header("Location: verify.php");
} 
// $name=$_COOKIE['name'];
// if($nama!='N/A'){
//     $nama=$nama;
// }
// else{
//     echo 'anda tidak dikenali';
// }

?>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <h1>Anda dikenali sebagai <?=$nama?></h1>
        <!-- <p>Apakah sudah tepat, bila belum <a href="verify">deteksi ulang</a></p> -->
         
            
        <!-- <a href="awal.php?name=<?=$nama?>">tekan</a> -->
        <a href="verify.php">verify</a>
         
    </body>
</html>