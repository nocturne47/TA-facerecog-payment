<?php
// if(isset($_GET['id'])){
//             $data=file_get_contents('http://127.0.0.1:8080/label');
//         // $data1=json_decode($data);
//             $data=json_decode($data, true);
//             $nama=$data['name'];
//             setcookie('name', $nama, time()+15*60);
//             // header("Location: verify.php");
//         } 
?>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="dikenal.php" method="GET">
            <button id="id" name="id">dikenali</button>
        </form>
        
        <img src="http://127.0.0.1:8080/video_feed" alt="">
         
            
        <!-- <a href="awal.php?name=<?=$nama?>">tekan</a> -->
        <!-- <a href="verify.php">verify</a> -->
         
    </body>
</html>