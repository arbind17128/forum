<?php

include "_dbconnect.php";
if($_SERVER['REQUEST_METHOD']="POST"){
  $username=$_POST['loginusername'];
  $password=$_POST['loginpassword'];

  $sql="SELECT * FROM `users` where  `username`='$username'";
  $result=mysqli_query($conn,$sql);
  $rowsNum=mysqli_num_rows($result);
  if($rowsNum==1){
    $rows=mysqli_fetch_assoc($result);
    
   
     if(password_verify($password, $rows['password'])){
        session_start();
        $_SESSION['loggedin']=true; 
        $_SESSION['username']=$username;
        $_SESSION['sno']=$rows['user_id'];
       
        header("location: /forum/index.php?loginAlert=true");
       
      
        
        
      }
     
  }
  else{
    echo "you have entered wrong unsername";
  }
}


?>