<?php
// // $data=$_GET('localhost:5000')[0];
// // $data1 = json_decode($data, true);
// // var_dump($data);
// // echo "data1:", $data1;

// $output=shell_exec('tst.py');
// print_r($output);
// if(isset($_POST['id'])){
//     header(Location: "awal.php");
//     exit;
// }
// if(isset($_GET['id'])){
//     $data1=file_get_contents('http://127.0.0.1:8080/verified');
// // $data1=json_decode($data);
//     $data1=json_decode($data1, true);
//     $Status=$data1['Status'];
//     if($Status!='Unknown'){
//         $Status='Verified';
//         header('Location: status.php');
//         die();
//     } else{
//         $Status='Unverified';
//         header('Location: gagal.php');
//         exit;
        
//     }
// }
//     setcookie('Status', $Status, time()+15*60);

//     echo 'Anda dinyatakan', $Status;
// } 


?>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <img src="http://127.0.0.1:8080/video_verify">
        <form action="status.php" method="GET">
            <button id="id" name="id">verifikasi</button>
        </form>
            
        <!-- <a href="awal.php?name=<?=$nama?>">tekan</a> -->
         
    </body>
</html>