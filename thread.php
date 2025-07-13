<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iConnect - Coding Forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
   body{
    background-color:rgb(4, 2, 14);
    color: black;
    
   }
    </style>
</head>

<body>
  <?php include  'child/_dbconnect.php';   ?>
  <?php include  'child/_header.php';   ?>
  <?php
  $id = $_GET['threadid'];
  $sql = "SELECT * FROM `threads` WHERE `thread_id`=$id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $title1 = $row['thread_title'];
    $desc = $row['thread_desc'];
    $thread_user_id =$row['thread_user_id'];
    

      $sql2 = "SELECT user_name FROM `users` WHERE user_id = '$thread_user_id '";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $username = $row2['user_name'];

  }

  ?>


  <?php
  $showaleart = false;
  $Method = $_SERVER['REQUEST_METHOD'];
  if ($Method == 'POST') {
    //insert in comment db
    $comment = $_POST['comment'];
    $comment =str_replace ("<", "&lt;", $comment);
    $comment =str_replace (">", "&gt;", $comment);
    $uid= $_POST['user_id'];

    $sql = "INSERT INTO `coment` ( `comment_contant`, `thread_id`, `comment_by`) VALUES ( '$comment', '$id', '$uid');";
    $result = mysqli_query($conn, $sql);
    $showaleart = true;
    if ($showaleart) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> Your comment has been added sucessfully!
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
  }
  ?>



  <div class="container my-4">

    <div class="mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-3">
        <h1 class="display-11 fw-bold"> <?php echo $title1; ?></h1>
        <p class="col-md-8 "><?php echo $desc; ?></p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque alias illo fugit? Non placeat eos, consequuntur provident enim cupiditate necessitatibus!</p>
        <p>Posted by:<b> <em><?php echo $username; ?></em> </b></p>
      </div>
    </div>
  </div>

  <?php
  

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<div class="container">
    <h1 class="py-2" style ="color:cyan;" >Post a comment</h1>
    <form action=" ' . $_SERVER['REQUEST_URI'] . '" method="post">

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label" style ="color:white;">Your comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        <input type="hidden" name="user_id" value= "'.$_SESSION['user_id'].'">
      </div>
      <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
  </div>';
  } else {
    echo ' <div class="container">
  <h1 class="py-2" style ="color:cyan;">Post a Comment</h1> 
     <p class="lead" style ="color:white;">You are not logged in. Please login to be able to post comments.</p>
  </div>';
  }
  ?>



  <div class="container">
    <h1 class="py-2" style ="color:yellow;">Descussion</h1>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `coment` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    $Noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
      $Noresult = false;
      $id = $row['comment_id'];
      $content = $row['comment_contant'];
      $time = $row['comment_time'];
      $comment_by = $row['comment_by'];

      $sql2 = "SELECT user_name FROM `users` WHERE user_id = '$comment_by'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $username = $row2['user_name'];

      echo '<div class="d-flex my-3">
      <div class="flex-shrink-0">
          <img src="img/user1.png" width="34rem" class="mr-2 mb-1.5rem"  alt="...">
        </div>
        <div class="flex-grow-1 ms-3">
        <p class ="fw-bold my-0" style ="color:white;">'. $username .' at ' . $time . '</p>
         <p style ="color:white;"> ' . $content . '</p>
        </div>
      </div>';
    }
    if ($Noresult) {
      echo '<div class="mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
          <p class="display-5 " "> No comments found for this question</p>
          <p >Be the first persone to comment on this questions</p>
         
        </div>
      </div>';
    }
    ?>

  </div>
  <?php include  'child/_footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>