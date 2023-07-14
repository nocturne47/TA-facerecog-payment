<?php
session_start();
require 'functions.php';


// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id=$_COOKIE['id'];
    $key=$_COOKIE['key'];

    $result=mysqli_query($conn, "SELECT username FROM nasabah WHERE id=$id");
    $row=mysqli_fetch_assoc($result);

    // cek setcookie dan username
    if($key===hash('sha256',$row['username'])){
        $_SESSION['login']=true;
    }
}
if(isset($_SESSION["login"])){
    header("Location: pengguna.php");
    exit;
}

if(isset($_POST["login"])){

    $username= $_POST["username"];
    $password= $_POST["password"];

    $result=mysqli_query($conn, "SELECT * FROM nasabah WHERE username='$username'");

    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            
            // set session
            $_SESSION["login"]=true;
            setcookie('id',$row['id'],time()+60);
            // cek remember me
            if(isset($_POST['remember'])){
                // buat cookie 
                setcookie('id',$row['id'],time()+15*60);
                setcookie('key', hash('sha256', $row['username']), time()+15*60);
            }

            header ("Location: pengguna.php");
            // // exit;
            // echo "dah masuk, $username" ;
            exit;
        }
    }
    $error=true;
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

    <title>Login</title>
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
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <!-- <h1>Produk</h1> -->
            </div>
        </div>
        <div class="container-sm pl-5 pr-5 ml-5 mr-5">
            <form class="form-signin pl-5 pr-5 ml-5 mr-5" action="" method="post">
                <div class="text-center mb-4">
                    <img class="mb-4" src="gambar/logousu.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    <p>Belum punya akun? <a href="registrasi.php">Sign Up.</a></p>
                </div>
                <div class="pl-5 pr-5 ml-5 mr-5">
                    <?php if(isset($error)):?>
                        <div class="alert alert-danger" role="alert">
                             Username atau password salah!   
                        </div>
                    <?php endif;?>
                </div>
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">
                    <!-- <label for="username">Username</label> -->
                </div>
    
                <div class="form-label-group pl-5 pr-5 ml-5 mr-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                    <!-- <label for="password">Password</label> -->
                </div>
    
                <div class="checkbox mb-3 pl-5 pr-5 ml-5 mr-5">
                    <label>
                    <input type="checkbox" name="remember" id="remember" value="remember-me"> Remember me
                    </label>
                </div>
                <div class="row pl-5 pr-5 ml-5 mr-5">
                    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
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
<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>

        <?php if(isset($error)):?>
            <p style="color:red; font-style: italic;">username atau password salah</p>
        <?php endif;?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password  :</label>
                        <input type="password" name="password" id="password">
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me?</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="login">Login</button>
                    </td>
                </tr>
            </table>
        </form>
        <p>Tidak punya akun?<a href="registrasi.php">Daftar</a></p>
        
    </body>
</html> -->