
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>welcome to- threadlist</title>
    <style>
    .color {
        background-color: #E9EBF0;

    }

    .min-height {
        min-height: 175px;

    }
    </style>

</head>

<body>
    <?php include "partial/_dbconnect.php";?>
    <?php include "partial/_header.php"; ?>
    <!-- <div class="container"> -->




    <?php
      $catid=$_GET['catId'];
      $sql= "SELECT * FROM `categories` WHERE  `category_id`='$catid'";
      $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $cat_title=$row['categories_title'];
        $cat_disc=$row['discription'];
      }
      
      ?>

      <?php
      $method= $_SERVER['REQUEST_METHOD'];
      
      if($method== "POST"){
        $catid=$_GET['catId'];
        $title=$_POST['title'];
        $disc=$_POST['problemdisc'];
        $userid=$_SESSION['sno']; 
        $disc=str_replace("<","&lt",$disc);
        $disc=str_replace(">","&gt",$disc);

        $title=str_replace("<","&lt",$title);
        $title=str_replace(">","&gt",$title);
        $sql= "INSERT INTO `threads` (`thread_title`, `thread_disc`, `thread_cat_id`, `thread_user_id`, `updated_time`) VALUES ('$title', '$disc', '$catid', '$userid', current_timestamp());";
        $result= mysqli_query($conn,$sql);

      }
      
      
      ?>
    <div class="container my-4 ">
        <div class="jumbotron color py-5 px-5">
            <h1 class="display-4">Lets learn <?php echo $cat_title?></h1>
            <p class="lead"><?php echo $cat_disc?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <b>Posted by: </b><a class="text-dark" href="userprofile.php" role="user">user</a>
        </div>
    </div>
<?php
    if(isset($_SESSION['username']) &&  $_SESSION['username']==true){
        echo '  <!-- starting -->
        <div class="container">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
          
      <div class="form-group">
        <label for="title">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter email">
      
      </div>
      <div class="form-group my-2">
        <label for="problemdisc">Problem dicription</label>
        <textarea class="form-control" id="problemdisc"  name="problemdisc" rows="3"></textarea>
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
        echo " you are not logged in";
    }
        ?>


    <!-- starting -->
    <div class="container mt-4">
        <?php
            $catid=$_GET['catId'];
            $sql= "SELECT * FROM `threads` WHERE  `thread_cat_id`='$catid'";
            $result= mysqli_query($conn,$sql);
            $nothread=true;
            while($row=mysqli_fetch_assoc($result)){
            $nothread=false;
            $thrad_title=$row['thread_title'];
            $thread_disc=$row['thread_disc'];
            $id=$row['thread_id'];
            $userid=$row['thread_user_id'];
            $sql1="SELECT * FROM `users` where `user_id`='$userid'";
            $resuslt1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($resuslt1);
            echo '<div class="row  mb-2">
            <div class="col-md-1 ">
                <img src="img/user.png" class="img-fluid" alt="Placeholder Image">
            </div>
            <div class="col-md-11">
                <div class="media-body">
                    <h5 class="mt-1"><b>Posted by: </b>'.$row1['username'].' <br><br> <a href="thread.php?threadid='.$id.'" class="text-dark">'.$thrad_title.'</a></h5>
                    <p>'.$thread_disc.'</p>
                </div>
            </div>
            </div>';
            }
            if($nothread){
                echo ' <br>
                <div class="container">
                <div class="text-centere">
                <h1 mx-0>Browse Question</h1>
            </div>
                <div class="jumbotron jumbotron-fluid color max-height">
            <div class="py-3 px-4">
                <h1 class="display-4">No thread found</h1>
                <p class="lead">be the first person to ask the question.</p>
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

   
    -->
</body>

</html>