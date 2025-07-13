<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iConnect - Coding Forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
   body{
    background-color:rgb(4, 2, 14);

   }
    </style>
  </head>

<body>
  <?php include  'child/_dbconnect.php';   ?>
  <?php include  'child/_header.php';   ?>
  <?php
  $id = $_GET['cateid'];
  $sql = "SELECT * FROM `category` WHERE `category_id`=$id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    $catname = $row['category_name'];
    $catdesc = $row['category_description'];
   
  }
  ?>
  <?php
  $showaleart = false;
  $Method = $_SERVER['REQUEST_METHOD'];
  if ($Method == 'POST') {
    $te_title = $_POST['title'];
    $te_desc = $_POST['desc'];
    $uid= $_POST['user_id'];

    $te_title = str_replace ("<","&lt;",$te_title);
    $te_title =str_replace ("'","&#39;",$te_title);
    $te_title = str_replace (">","&gt;",$te_title);

    $te_desc =str_replace ("'","&#39;",$te_desc);
    $te_desc = str_replace ("<","&lt;",$te_desc);
    $te_desc = str_replace (">","&gt;",$te_desc);
    

    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cate_id`, `thread_user_id`) VALUES (  '$te_title', '$te_desc', '$id', '$uid')";
    $result = mysqli_query($conn, $sql);
    $showaleart = true;
    if ($showaleart) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your thread has been added sucessfully Please wait until some one reply to your thread.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
  }
  ?>
  <div class="container my-4">

    <div class="mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold" >Welcome to
          <?php echo $catname; ?> Community
        </h1>
        <p class="col-md-8 ">
          <?php echo $catdesc; ?><br><br>
      
        </p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque alias illo fugit? Non placeat eos,
          consequuntur provident enim cupiditate necessitatibus!</p>
        <button class="btn btn-primary btn-lg" type="button" role="button">Learn More</button>
      </div>
    </div>
  </div>


  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo ' <div class="container" style ="color:white;">
    <h1 class="py-2" style ="color:cyan;">Ask Questions</h1>
    <form action=" ' . $_SERVER['REQUEST_URI'] . ' " method="post">
      <div class="mb-3 " >
        <label for="" class="form-label">Problem title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="text" class="form-text"style ="color:white;">Keep your title as short and valuable as possible.</div>
      </div> 
      <div class="mb-3" style ="color:white;">
        <label for="exampleFormControlTextarea1" class="form-label">Your consurt</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
         <input type="hidden" name="user_id" value= "'.$_SESSION['user_id'].'">
      </div>
      <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
  </div>';
  } 
  else {
    echo '   
  <div class="container">
  <h1 class="py-2" style ="color:cyan;">Ask Questions</h1> 
     <p class="lead" style ="color:white;">You are not logged in. Please login to be able to post comments.</p>
  </div>
  ';
  }
  ?>

  <div class="container my-4">
    <h1 class="py-2" style ="color:yellow;">Browse Questions</h1>
    <?php
    $id = $_GET['cateid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cate_id=$id";
    $result = mysqli_query($conn, $sql);
    $Noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
      $Noresult = false;
      $id = $row['thread_id'];
      $ques = $row['thread_title'];
      $desc = $row['thread_desc'];
      $time = $row['timestamp'];
      $thread_user_id = $row['thread_user_id'];

      $sql2 = "SELECT user_name FROM `users` WHERE user_id = '$thread_user_id'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $username = $row2['user_name'];

      echo ' <div class="d-flex my-3">
         <div class="flex-shrink-0">
            <img src="img/user1.png" width="54rem" class="mr-3 alt="...">
         </div>
         <div class="flex-grow-1 ms-3">
           <p class ="fw-bold my-0 mx-4 " style ="color:white;"> Ask by : '. $username.' at  ' . $time . '</p>
           <h5><a class ="mb-3" style ="color:white;" href ="thread.php?threadid=' . $id . '">' . $ques . '</a></h5>
           <p  style ="color:white;">' . $desc . '</p>
           </div>
        </div>';
    }
    // echo var_dump($Noresult);
    if ($Noresult) {
      echo '<div class="mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
          <p class="display-5 " > No questions for this categry</p>
          <p >Be the first persone to ask the questions</p>
         
        </div>
      </div>';
    }
    
    ?>
  </div>
  <?php include  'child/_footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>