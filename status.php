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
if(isset($_GET['id'])){
    $data1=file_get_contents('http://127.0.0.1:8080/verified');
// $data1=json_decode($data);
    $data1=json_decode($data1, true);
    $Status=$data1['Status'];
    if($Status!=='Unknown'){
        $Status='Verified';
        echo 'Anda dinyatakan', $Status;
        header('Location: detail.php');
        
        
    } else{
        $Status='Unverified';
        header('Location: gagal.php');
        
    }
    setcookie('Status', $Status, time()+15*60);

    

} 


?>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
            
        <!-- <a href="awal.php?name=<?=$nama?>">tekan</a> -->
         
    </body>
</html>