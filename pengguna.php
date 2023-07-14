<?php
require 'functions.php';
session_start();



if(!isset($_SESSION["login"])){
    echo "<script>
        alert('sesi telah berakhir')
    </script>";
    header("Location: login.php");
    exit;
}

if(!isset($_COOKIE['id'])){
    session_destroy();
    exit;
}


$id=$_COOKIE['id'];
$user=query("SELECT * FROM nasabah WHERE id=$id");

?>
<?php foreach($user as $use):?>
    <?php $id=$use['id'];?>
    <?php $nama=$use['nama'];?>
    <?php $username=$use['username'];?>
    <?php $notel=$use['notel'];?>
    <?php $email=$use['email'];?>
    <?php $saldo=$use['saldo'];?>
<?php endforeach;?>

<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
        <h1>Profile <?=$nama?></h1>
        <table>
                <tr>
                    <td>
                        <label for="username">Username</label> 
                    </td>
                    <td>
                        :<?= $username?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama">Nama</label> 
                    </td>
                    <td>
                        :<?= $nama?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="notel">No. Telp</label> 
                    </td>
                    <td>
                        :<?= $notel?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email</label> 
                    </td>
                    <td>
                        :<?= $email?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="saldo">saldo</label> 
                    </td>
                    <td>
                        <a href="hist.php?id=<?=$id?>">:Rp.<?= $saldo?>,- </a>
                    </td>
                </tr>
        </table>
        <a href="beranda.php">Beranda</a>
        <a href="logout.php">Logout</a>
        <a href="ubah.php?id=<?=$id?>">Ubah Data</a>
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

    <title>Profile</title>
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
                <a class="nav-item nav-link active" href="#">Pengguna</a>
                <a class="nav-item nav-link" href="kritikdansaran.php">Kritik dan Saran</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- <h1>Profile <?=$nama?></h1> -->
    <div class="container mx-auto text-center mt-5 ">
        <h1>Profile Pengguna</h1>
        <div class="card text-center mx-auto mb-5 mt-5" style="width: 18rem;">
    
        
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title"><?=$nama?></h5>
                <p class="card-text"><?=$username?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=$notel?></li>
                <li class="list-group-item"><?=$email?></li>
                <li class="list-group-item"><a href="hist.php?id=<?=$id?>">Rp.<?= $saldo?>,-</li>
            </ul>
            <div class="card-body">
                <a href="logout.php" class="card-link">Logout</a>
                <a href="ubah.php?id=<?=$id?>" class="card-link">Ubah Data</a>
            </div>
        </div>
    </div>
     
    <footer class="mastfoot mt-5">
        <div class="inner">
            <p class="mt-5 mb-3 text-muted text-center">© Skripsi by Ferdinand Immanuel, <a href="https.dte.usu.ac.id">DTE USU 2023</a></p>
        </div>
    </footer>
        <!-- <table>
                <tr>
                    <td>
                        <label for="username">Username</label> 
                    </td>
                    <td>
                        :<?= $username?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama">Nama</label> 
                    </td>
                    <td>
                        :<?= $nama?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="notel">No. Telp</label> 
                    </td>
                    <td>
                        :<?= $notel?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email</label> 
                    </td>
                    <td>
                        :<?= $email?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="saldo">saldo</label> 
                    </td>
                    <td>
                        <a href="hist.php?id=<?=$id?>">:Rp.<?= $saldo?>,- </a>
                    </td>
                </tr>
        </table>
        <a href="logout.php">Logout</a>
        <a href="ubah.php?id=<?=$id?>">Ubah Data</a> -->
        

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
