<?php 
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-50000">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum/index.php">Home</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categores
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
         $sql="SELECT * FROM `categories` ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
         echo '<a class="dropdown-item" href="threadlist.php?catId='.$row["category_id"].'"> '.$row['categories_title'].' </a>';
        }
        echo' </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
    </ul>
    <div class="mx-2 d-flex">';
    if(isset($_SESSION['username']) &&  $_SESSION['username']==true){
     echo' <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success " type="submit">Search</button>
           <div class="container ">
            <div class="row">
              <div class="col-md-12">
                <div class="icon-container me-0">
                <img src="img/1.jpeg" alt="Icon" class="rounded-circle img-fluid" style="width: 40px; height: 40px;">
                </div>
              </div>
            </div>
           </div>
      <p class="text-light my-0 mx-2 ">welcome<br>'.$_SESSION['username'].'</p>
      <a class="btn btn-outline-success me-2" href="partial/_logout.php">logout</a>
    </form>';
     }
     else{
       echo'<form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success me-2" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-success me-2 "  data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
      <button class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#logoutModal" >signup</button>';  }
   echo' </div>
  </div>
</div>
</nav>';
   
     
include 'partial/_loginmodal.php';
include 'partial/_signupmodal.php';


if(isset($_GET["showAlert"]) && $_GET["showAlert"]==true){
  echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}



  if(isset($_GET["showErr"]) && $_GET["showErr"]==true){
  echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> password is not matched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if(isset($_GET["showErr1"]) && $_GET["showErr1"]==true){
  echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> user already exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if(isset($_GET["loginAlert"]) && $_GET["loginAlert"]==true){
  echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! '.$_SESSION['username'].', </strong> you are loggedin.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
?>