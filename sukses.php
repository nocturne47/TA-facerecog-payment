<?php
require 'functions.php';
// if(isset($_POST['id'])){
//     $uname=$_COOKIE['name'];
//     $barang=$_COOKIE['barang'];
//     $jumlah=$_COOKIE['jumlah'];
//     $harga=$_COOKIE['harga'];
//     // $time=$_COOKIE['waktu'];

//     // echo $uname;
//     // echo $barang;
//     // echo $jumlah;
//     // echo $harga;
//     // echo $time;

//     $nas=query("SELECT * FROM nasabah where username='$uname'")[0];
//     $saldoawal=$nas['saldo'];
//     $saldoakhir=$saldoawal-$harga;
    


    setcookie('name', '');
    setcookie('barang', '');
    setcookie('jumlah', '');
    setcookie('harga', '');
    setcookie('waktu', '');


?>

<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Pembayaran Anda Telah Berhasil</h1>
        <a href="beranda.php">kembali ke beranda</a>
    </body>
</html>