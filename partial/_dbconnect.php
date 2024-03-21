<?php 
    $servername='localhost';
    $usnername='root';
    $password="";
    $db='forum';
    $conn=mysqli_connect($servername,$usnername,$password,$db);
    if(!$conn){
       die("error".mysqli_connect_error($conn));
    }
   

?>
