<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
      .underline{
        text-decoration: none;
      }
    </style>

    <title>welcome to- forum</title>
  </head>

  <body>
  <?php include "partial/_dbconnect.php"; ?>
    <?php include "partial/_header.php"; ?>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide1.jpg" height="400" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide2.jpeg" height="400" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide3.jpeg" height="400" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  

   


    <div class="container">
      <h4 class="text-center my-3">Ak-forum Browse Categories</h4>
      <div class="row">
      <?php 
    $sql= "SELECT * FROM `categories`";
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $id=$row['category_id'];
      $str=$row['discription'];
      $str1=substr($str, 0, 50);
    echo '  <div class="col-md-4 my-2">
    <div class="card" style="width: 18rem;">
      <img src="img/1.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
       <h5 class="card-title "><a href="threadlist.php?catId='.$id.'" class"underline">'.$row['categories_title'].'</a></h5>
     <p class="card-text">'.$str1.'</p>
    <a href="threadlist.php?catId='.$id.'" class="btn btn-primary">View Threads</a>
    </div>
    </div>
</div>';
    }
   
    ?>
                  

                
      </div>
    </div>







    <?php include "partial/_footer.php"; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>