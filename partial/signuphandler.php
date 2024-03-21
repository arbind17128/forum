<?php 
include "_dbconnect.php";



if($_SERVER['REQUEST_METHOD']=="POST"){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
   
   $existsql="SELECT * FROM `users` where `username`='$username';";
   $userexist=mysqli_query($conn,$existsql);
   $userNum=mysqli_num_rows($userexist);
   if($userNum > 0 ){
    header("location: /forum/index.php?showErr1=true");

     
   }else{
    if($password == $cpassword){
        $pass= password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`username`, `password`, `img_url`, `updated_time`) VALUES ('$username', '$pass', 'thkhtk.jpg', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showAlert=" you can login";
         header("location: /forum/index.php?showAlert=true");
         }
        else{
            $showErro="password is not matched";
            echo $showErro;
            // header("location: /forum/index.php?showAlert=false&showErr=true");
           
        }

    }
    else{
       
    //    password is not matched
        header("location: /forum/index.php?showErr=true");
       
    }
   
   }
   
 
   
}

?>