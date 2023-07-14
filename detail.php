<?php
// date_default_timezone_set("Asia/Jakarta");
$tme=date("Y-m-d H:i:s", time()+5*3600);
require 'functions.php';
$uname=$_COOKIE['name'];
$jumlah=$_COOKIE['jumlah'];
$barang=$_COOKIE['barang'];
$harga=$_COOKIE['harga'];
$bar=query("SELECT * FROM barang WHERE barang='$barang'")[0];
$nas=query("SELECT * FROM nasabah WHERE username='$uname'");
$jlhbarang=$bar['jumlah'];
// $tme=strtotime(date("dmyHis"));


// $date = date('Y-m-d H:i:s',strtotime($month.' '.$day.','.$year.' '.$hour.':'.$minute.' '.$ampm));
// echo $date;
if(isset($_POST['kurang'])){
    if(topdown($_POST)>0){
        if(kurstok($_POST)>0){
            if(riwayat($_POST)>0){
                echo "<script>
                alert('Pembayaran berhasil')
                </script>
                ";
                header("Location: sukses.php");
                exit;
            }else{
                mysqli_error($conn);
                header("Location: gagal.php");
                exit;

            }
        }else{
            mysqli_error($conn);
            header("Location: gagal.php");
            exit;
        }
    } else{
        mysqli_error($conn);
        header("Location: gagal.php");
        exit;
    }
    // // if(kurstok($_POST)>0){
    // //     echo "<script>
    // //     alert('Pembayaran berhasil')
    // //     </script>
    // //     ";
    // // } else{
    // //     mysqli_error($conn);
    // // }
    // // if(riwayat($_POST)>0){
    // //     echo "<script>
    // //     alert('Pembayaran berhasil')
    // //     </script>
    // //     ";
    // // } else{
    //     mysqli_error($conn);
    // }
    
}
if(isset($_POST['id'])){
    // $time=date("dmyHis");
    setcookie('uname', $username, time()+60*5);
    setcookie('barang', $barang, time()+60*5);
    setcookie('jumlah', $jumlah, time()+60*5);
    setcookie('harga', $harga, time()+60*5);
    setcookie('waktu', $tme, time()+60*5);
}
?>
<?php foreach($nas as $nasabah):?>
    <?php $id=$nasabah['id'];?>
    <?php $nama=$nasabah['nama'];?>
    <?php $username=$nasabah['username'];?>
    <?php $notel=$nasabah['notel'];?>
    <?php $email=$nasabah['email'];?>
    <?php $saldo=$nasabah['saldo'];?>
<?php endforeach;?>
<!doctype html>
<html>
    <head>
        <title>Detail Pembayaran</title>
    </head>
    <body>
        <table>
                <p>Detail Pengguna</p>
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
                        <label for="email">email</label> 
                    </td>
                    <td>
                        :<?= $email?> 
                    </td>
                </tr>
                Detail Pembelian
                <tr>
                    <td>
                        <label for="barang">Jenis Produk</label> 
                    </td>
                    <td>
                        :<?= $barang?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="persatu">Harga</label> 
                    </td>
                    <td>
                        :<?= $bar['harga']?> 
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="jumlah">Kuantitas Pembelian</label> 
                    </td>
                    <td>
                        :<?= $jumlah?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="harga">Nominal Pembayaran</label> 
                    </td>
                    <td>
                        :<?= $harga?> 
                    </td>
                </tr>
        </table>
        <form action="" method="post">
            <input type="hidden" name="saldo" id="saldo" value="<?=$saldo?>">
            <input type="hidden" name="ide" id="ide" value="<?=$id?>">
            <input type="hidden" name="harga" id="harga" value="<?=$harga?>">
            <input type="hidden" name="jumbel" id="jumbel" value="<?=$jumlah?>">
            <input type="hidden" name="jumwal" id="jumwal" value="<?=$jlhbarang?>">
            <input type="hidden" name="barang" id="barang" value="<?=$barang?>">
            <input type="hidden" name="waktu" id="waktu" value="<?=$tme?>">
            
            <button name='kurang' id='kurang'>Bayar</button>
        </form>

    </body>
</html>