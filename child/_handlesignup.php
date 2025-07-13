<?php
$showError = "false";
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userfname = $_POST['firstname'];
    $user_num = $_POST['number'];
    $username = $_POST['signupEmail'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $existsql = "SELECT * FROM `users` WHERE user_email = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email already in use";
    } 
    else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = " INSERT INTO `users` ( `user_name`,  `user_mob_no`, `user_email`, `user_pass`,`user_cpass`) VALUES ('$userfname', '$user_num', '$username', '$hash','$cpass')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                header("Location: /forums/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        
        }
    }
    header("Location: /forums/index.php?signupsuccess=false&error=$showError");
    echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    < strong>Error!</strong>' . $showError  .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<?php
// session_start(); // Start the session to use session variables
// include '_dbconnect.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $userfname = $_POST['firstname'];
//     $user_num = $_POST['number'];
//     $username = $_POST['signupEmail'];
//     $pass = $_POST['pass'];
//     $cpass = $_POST['cpass'];

//     // Check if email already exists
//     $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_email = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $numRows = $result->num_rows;

//     if ($numRows > 0) {
//         $_SESSION['error'] = "Email already in use";
//     } else {
//         if ($pass == $cpass) {
//             $hash = password_hash($pass, PASSWORD_DEFAULT);
//             // Insert user data into the database
//             $stmt = $conn->prepare("INSERT INTO `users` (`user_name`, `user_mob_no`, `user_email`, `user_pass`) VALUES (?, ?, ?, ?)");
//             $stmt->bind_param("ssss", $userfname, $user_num, $username, $hash);
//             $result = $stmt->execute();

//             if ($result) {
//                 header("Location: /forums/index.php?signupsuccess=true");
//                 exit();
//             } else {
//                 $_SESSION['error'] = "Registration failed. Please try again.";
//             }
//         } else {
//             $_SESSION['error'] = "Passwords do not match";
//         }
//     }

//     // Redirect with error message
//     header("Location: /forums/index.php?signupsuccess=false");
//     echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
//     < strong>Error!</strong>' .$_SESSION['error'] .'
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
//     exit();
// }
?>

