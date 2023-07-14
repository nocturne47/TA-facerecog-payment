<?php
require 'functions.php';




// ambil data
$id=$_GET["id"];
$user=query("SELECT * FROM nasabah WHERE id=$id")[0];

if(isset($_POST["update"])){
    if(ubah($_POST)>0){
        echo "<script>
                alert('user baru diubah')
            </script>";
    } else{
        echo mysqli_error($conn);
    }
    header ("Location: pengguna.php");
    exit;
}

?>
<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Update Data</title>
        <style>
            label{
                display: block;
            }
        </style>
    </head>
    <body>
        <h1>Ubah Data</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$user['id'];?>">
        <table>
                <tr>
                    <td>
                        <label for="nama">Nama  :</label> 
                        <input type="text" name="nama" id="nama" required="required" value="<?=$user['nama']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email  :</label> 
                        <input type="text" name="email" id="email" required="required" value="<?=$user['email']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="notel">No. Telp  :</label> 
                        <input type="text" name="notel" id="notel" required="required" value="<?=$user['notel']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username :</label> 
                        <input type="text" name="username" id="username" required="required" value="<?=$user['username']?>">
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label for="password">Password  :</label> 
                        <input type="password" name="password" id="password" required="required">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password2">Konfirmasi Password  :</label> 
                        <input type="password" name="password2" id="password2" required="required">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="update">Update</button>
                    </td>
                </tr>
        </table>
        </form>
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

    <title>Update</title>
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
            <a class="navbar-brand" href="beranda.php">
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
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <!-- <h1>Produk</h1> -->
            </div>
        </div>
        <div class="container-sm pl-5 pr-5 ml-5 mr-5">
            <form class="form-signin pl-5 pr-5 ml-5 mr-5" action="" method="post">
            <input type="hidden" name="id" value="<?=$user['id'];?>">
                <div class="text-center mb-4">
                    <img class="mb-4" src="gambar/logousu.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Update</h1>
                    <!-- <p>Sudah punya akun? <a href="login.php">Log In.</a></p> -->
                </div>
                <div class="pl-5 pr-5 ml-5 mr-5">
                    <!-- <?php if(isset($error)):?>
                        <div class="alert alert-danger" role="alert">
                             Username atau password salah!   
                        </div>
                    <?php endif;?> -->
                </div>
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama anda..." required="" autofocus="" value="<?=$user['nama']?>">
                    <!-- <label for="username">Username</label> -->
                </div>
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan alamat email anda..." required="" autofocus="" value="<?=$user['email']?>">
                    <!-- <label for="username">Username</label> -->
                </div>
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="notel">No. Telp</label>
                    <input type="text" name="notel" id="notel" class="form-control" placeholder="Masukkan nomor telepon anda..." required="" autofocus="" value="<?=$user['notel']?>">
                    <!-- <label for="username">Username</label> -->
                </div>
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda..." required="" autofocus="" value="<?=$user['username']?>">
                    <!-- <label for="username">Username</label> -->
                </div>
    
                <!-- <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda..." required="">
                     <label for="password">Password</label> -->
                <!-- </div> -->
                <!-- <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi ulang password anda..." required="">
                     <label for="password">Password</label>
                </div> -->
                <br>
                <!-- <div class="checkbox mb-3 pl-5 pr-5 ml-5 mr-5">
                    <label>
                    <input type="checkbox" name="remember" id="remember" value="remember-me"> Remember me
                    </label>
                </div> -->
                <div class="row pl-5 pr-5 ml-5 mr-5">
                    <button class="btn btn-lg btn-primary btn-block" name="update" type="submit">Update</button>
                </div>
            </form>
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