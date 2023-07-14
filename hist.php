<?php
session_start();
require 'functions.php';

// if(isset($_SESSION["login"])){
//     header("Location: pengguna.php");
//     exit;
// }
$id=$_GET['id'];
$nas=query("SELECT * FROM nasabah WHERE id=$id")[0];
$riws=query("SELECT * FROM riwayat WHERE id=$id");
// var_dump($riw);


?>

<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Informasi Saldo</title>
    </head>
    <body>
        <h1>Informasi Saldo</h1>
        <table>
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    : <?=$nas['nama'];?>
                </td>
            </tr>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    : <?=$nas['username'];?>
                </td>
            </tr>
            <tr>
                <td>
                    saldo
                </td>
                <td>
                    :Rp.<?=$nas['saldo'];?>,-
                </td>
            </tr>
        </table>
        <a href="topup.php?id=<?=$id;?>">Top Up Saldo</a>
        <h2>Riwayat Transaksi</h2>
        <table>
            <tr>
                <td>
                    Kode Transaksi
                </td>
                <td>
                    Nama Produk
                </td>
                <td>
                    Waktu Transaksi
                </td>
                <td>
                    Nominal Transaksi
                </td>
            </tr>
            <tr>
                <td>
                    <?=$riw['kode']?>
                </td>
                
                <td>
                    <?=$riw['namaproduk']?>
                </td>
                <td>
                    <?=$riw['waktu']?>
                </td>
                <td>
                    <?=$riw['nominal']?>
                </td>
            </tr>
        </table>
    </body>
</html> -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Riwayat Transaksi</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="gambar/logo-prodi-ELEKTRO.png" >
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="beranda.php">Beranda</a>
                <a class="nav-item nav-link" href="pembelian.php">Pembelian</a>
                <!-- <a class="nav-item nav-link active" href="beranda.php">Beranda</a> -->
                <a class="nav-item nav-link " href="kontakkami.php">Kontak Kami</a>
                <a class="nav-item nav-link active" href="pengguna.php">Pengguna</a>
                <a class="nav-item nav-link" href="kritikdansaran.php">Kritik dan Saran</a>
                </div>
            </div>
        </div>
    </nav>
    <table class="table mt-5 md-5">

        <thead class="thead-dark">
            <h3>Informasi Saldo</h3>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Saldo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$nas['nama'];?></td>
                <td><?=$nas['username'];?></td>
                <td><?=$nas['saldo'];?></td>
                <td><a href="topup.php?id=<?=$id;?>">Isi Saldo</a></td>
            </tr>
        </tbody>
    </table>

    <table class="table mt-5 md-5">
        <thead class="thead-light">
            <h3>Riwayat Transaksi</h3>
            <tr>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Waktu Transaksi</th>
                <th scope="col">Nominal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($riws as $riw):?>
                <tr>
                        <td><?=$riw['kode']?></td>
                        <td><?=$riw['namaproduk']?></td>
                        <td><?=$riw['waktu']?></td>
                        <td><?=$riw['nominal']?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
     
    <footer class="mastfoot mt-5">
        <div class="inner">
            <p class="mt-5 mb-3 text-muted text-center">© Skripsi by Ferdinand Immanuel, <a href="https.dte.usu.ac.id">DTE USU 2023</a></p>
        </div>
    </footer>
<script
    src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>