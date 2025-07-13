<?php
$_SESSION['loggedin'] = false;
session_start();
echo'<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forums">iConnect</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forums">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql = "SELECT `category_id`,`category_name` FROM `category` LIMIT 3";
          $result = mysqli_query($conn, $sql);
          while($row= mysqli_fetch_assoc($result)){
            echo '<a class="dropdown-item" href="threadlist.php?cateid=' . $row['category_id'] . '">'.$row['category_name'].'</a>';
          }
         
         echo' </div>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      ';
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
         echo ' <form class="d-flex " role="search" method="get" action="search.php">
        <input class="form-control " name="search" type="search" actiion="search.php" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button></form>
        <span class="text-light ">Welcome <b>' .  $_SESSION['userfname'] . ' </b></span>
          <a href="child/_logout.php" class="btn btn-outline-success ml-2">Logout</a>';
      }
      else{
    echo'<form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" name="search" type="search" actiion="search.php" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <button type ="button" class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#loggingModal">login</button>
        <button type ="button" class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupModal" >signup</button> 
      </form>';
      }
   echo' </div>
  
  </div>
</nav>';
include 'child/_signup.php';
include 'child/_logging.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>