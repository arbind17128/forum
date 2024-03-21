<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>welcome to- thread</title>
    <style>
    .color {
        background-color: #E9EBF0;

    }

    .min-height {
        min-height: 292px;

    }
    </style>

</head>

<body>
<?php include "partial/_dbconnect.php";?>
    <?php include "partial/_header.php"; ?>
    <!-- <div class="container"> -->



 

    <?php
    
      
      $catid=$_GET['threadid'];
      $sql= "SELECT * FROM `threads` WHERE  `thread_id`='$catid'";
      $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
       $thread_title=$row['thread_title'];
       $thread_disc=$row['thread_disc'];
        echo '  <div class="container my-4 ">
        <div class="jumbotron color py-5 px-5">
            <h1 class="display-4">'.$thread_title.'</h1>
            <p class="lead">'.$thread_disc.'</p>
            <hr class="my-4">
            <p>'.$thread_disc.'</p>
            <b>Posted by: </b><a class="text-dark" href="userprofile.php" role="user">helo world</a>        </div>';
      }
     
      ?>
    </div>
    </div>

<?php  
    if(isset($_SESSION['username']) &&  $_SESSION['username']==true){
        echo '
        <div class="container">
            <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    
                <div class="form-group my-2">
                    <h2 class="py-2">Post a comments</h2>
                    <label for="comment">post a comments</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
        </div>';
    }
    else {
        echo 'you are not logged in';
    }

?>


    
<?php
      $method= $_SERVER['REQUEST_METHOD'];
      
      if($method== "POST"){
        $threadid=$_GET['threadid']; 
         $comments_content=$_POST['comment'];
        $comments_content=str_replace("<","&lt",$comments_content);
        $comments_content=str_replace(">","&gt",$comments_content);
        $user_id=$_SESSION['sno'];
      
      
      
        
        $sql= "INSERT INTO `comments` (`comment_contents`, `commented_by`, `thread_id`, `commented_time`) VALUES ('$comments_content', '$user_id', '$threadid', current_timestamp());";
        $result= mysqli_query($conn,$sql);

      }
      
      
      ?>



    <div class="container mt-4">
    <h1 class="my-2">Discussion</h1>
        <?php
            $threadid=$_GET['threadid'];
            $sql= "SELECT * FROM `comments` WHERE  `thread_id`='$threadid'";
            $result= mysqli_query($conn,$sql);
           
            $nothread=true;
            while($row=mysqli_fetch_assoc($result)){
                
            $nothread=false;
            $comments_content=$row['comment_contents'];
            $id=$row['thread_id'];
            $userid=$row['commented_by'];
            $sql1="SELECT username FROM `users` where `user_id`='$userid'";
            $resuslt1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($resuslt1);
            $commented_by=$row1['username'];
            echo '<div class="row  mb-2">
                  <div class="col-md-1 ">
                    <img src="img/user.png" class="img-fluid" alt="Placeholder Image">
                    
                </div>
                   <div class="col-md-11">
                   <p class="fw-bold">'.$commented_by.'</p>
                   '. $comments_content.'
                </div>
            </div>';
            }
            if($nothread){
                echo ' <br>
                <div class="container">
                <div class="text-centere">
                <h1 mx-0>Post a Comments</h1>
            </div>
                <div class="jumbotron jumbotron-fluid color max-height">
            <div class="py-3 px-4">
                <h1 class="display-4">No Comment found</h1>
                <p class="lead">be the first person to comment.</p>
            </div>
            </div>
                </div>';
            }

            ?>

    </div>












    <?php include "partial/_footer.php"; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>