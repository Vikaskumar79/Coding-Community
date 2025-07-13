<?php
$showError = "false";
$_SESSION['loggedin'] = false;
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    //$userfname = $_POST['firstname'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
// $sql3 = "SELECT user_password FROM `users` WHERE user_id = '$thread_user'";
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['useremail'] = $email;
            $_SESSION['userfname'] = $row['user_name'];
          

            echo "logged in" . $email;
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You loggedin sucessfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

        else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>danger!</strong> username or password not match!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        header("Location: /forums/index.php");
    }
    
   
    header("Location: /forums/index.php");
}
