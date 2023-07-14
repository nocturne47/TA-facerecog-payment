<?php
$conn=mysqli_connect("localhost","root","","perancangan");


function query($query){
    global $conn;
    $result=mysqli_query($conn, $query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $nama=htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $notel=htmlspecialchars($data["notel"]);
    $username=strtolower(stripslashes($data["username"]));
    $password=mysqli_real_escape_string($conn, $data["password"]);
    $password2=mysqli_real_escape_string($conn, $data["password2"]);

    // cek uname ada?
    $result=mysqli_query($conn, "SELECT username FROM nasabah WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('username sudah terdaftar!')
        </script>";
        return false;
    }
    if($password!=$password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!')
                </script>";
        return false;
    }
    // enkripsi pass
    $password=password_hash($password, PASSWORD_DEFAULT);
    // tambah
    mysqli_query($conn, "INSERT INTO nasabah VALUES('','$nama','$notel','$email',0,'$username','$password')");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id=$data["id"];
    $nama=htmlspecialchars($data["nama"]);
    $email=htmlspecialchars($data["email"]);
    $notel=htmlspecialchars($data["notel"]);
    $username=strtolower(stripslashes($data["username"]));

    $query="UPDATE nasabah SET 
                nama='$nama',
                email='$email',
                notel='$notel',
                username='$username'
            WHERE id=$id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function topup($data){
    global $conn;
    $id=$data["id"];
    $saldo=(int)$data["saldo"]+(int)$data["topup"];

    $query="UPDATE nasabah SET
                saldo='$saldo'
            WHERE id=$id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}
function topdown($data){
    global $conn;
    $id=$data["ide"];
    $saldo=(int)$data["saldo"]-(int)$data["harga"];
    if($saldo<0){
        echo "<script>
                alert('saldo anda tidak mencukupi!')
                </script>";
        return false;
    }

    $query="UPDATE nasabah SET
                saldo='$saldo'
            WHERE id=$id
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}
function kurstok($data){
    global $conn;
    $barang=$data["barang"];
    $jumlahbaru=(int)$data["jumwal"]-(int)$data["jumbel"];
    if($jumlahbaru<0){
        echo "<script>
                alert('stok produk telah habis!')
                </script>";
        return false;
    }

    $query="UPDATE barang SET
                jumlah='$jumlahbaru'
            WHERE barang='$barang'
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}
function riwayat($data){
    global $conn;
    $namaproduk=$data['barang'];
    $id=$data["ide"];
    $waktu=$data["waktu"];
    // $waktu=
    $nominal=$data['harga'];
    $query="INSERT INTO riwayat VALUES('','$namaproduk','$id','$waktu','$nominal')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function krit($data){
    global $conn;
    $kritik=$data['kridansar'];
    $username=$data["username"];
    // $waktu=
    $kode=$data['kode'];
    $query="INSERT INTO kritikdansaran VALUES('$username','$kritik','$kode')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>