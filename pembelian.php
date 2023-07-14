<?php
require 'functions.php';
$prods=query("SELECT * FROM barang");

// ambil data
// $id=$_GET["id"];
// $user=query("SELECT * FROM nasabah WHERE id=$id")[0];
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Pembelian</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="beranda.php">
                <img src="gambar/logo-prodi-ELEKTRO.png" >
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="beranda.php">Beranda</a>
                <a class="nav-item nav-link active" href="#">Pembelian</a>
                <!-- <a class="nav-item nav-link active" href="beranda.php">Beranda</a> -->
                <a class="nav-item nav-link " href="kontakkami.php">Kontak Kami</a>
                <a class="nav-item nav-link" href="pengguna.php">Pengguna</a>
                <a class="nav-item nav-link" href="kritikdansaran.php">Kritik dan Saran</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>Produk</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach($prods as $prod):?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="gambar/<?= $prod["gambar"];?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $prod["barang"];?>
                        </h5>
                        <p class="card-text">
                            <?= $prod["deskripsi"];?>
                        </p>
                        <h5 class="card-title">
                            <?=rupiah($prod["harga"]);?>
                        </h5>
                        <a href="pembayaran.php?barang=<?=$prod['barang']?>" class="btn btn-primary">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach ;?>
        </div>
    </div>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p class="mt-5 mb-3 text-muted text-center">© Skripsi by Ferdinand Immanuel, <a href="https.dte.usu.ac.id">DTE USU 2023</a></p>
        </div>
      </footer>
    </div>
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>


<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Pembelian</title>
    </head>
    <body>
        <h1>Produk</h1>
        <p>Silahkan Pilih Produk Anda</p>
        <table cellpadding="10">
            <?php foreach($prods as $prod):?>
            <tr>
                <td>
                    <a href="pembayaran.php?barang=<?=$prod['barang']?>"?><?=$prod['barang'];?></a>
                    <br>
                </td>
                <td>
                    <img src="gambar/<?=$prod['gambar'];?>" width="50" alt="">
                    <br>
                </td>
                <td>
                    Rp.<?=$prod['harga'];?>,-
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </body>
</html> -->