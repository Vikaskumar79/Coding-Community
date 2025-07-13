<!-- 
// Start session if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <
        // Display any success or error messages
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <form action="forgot_password.php" method="POST">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" name="submit">Send Reset Link</button>
        </form>
    </div>

    <
    // Handle form submission
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        
        // Make sure the email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Call your reset password function (you need to implement it below)
            sendResetLink($email);
        } else {
            $_SESSION['message'] = "Please enter a valid email address.";
        }
    }

    // Function to handle password reset email
    function sendResetLink($email) {
        // Connect to the database (replace with your DB credentials)
        $conn = new mysqli("localhost", "username", "password", "database");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Generate a unique reset token
            $token = bin2hex(random_bytes(16));
            $expireTime = time() + 3600; // Token expires in 1 hour

            // Store the token and expiry time in the database
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
            $stmt->bind_param("sis", $token, $expireTime, $email);
            $stmt->execute();

            // Send reset link via email
            $resetLink = "http://yourwebsite.com/reset.php?token=" . $token;

            $subject = "Password Reset Request";
            $message = "Click the link to reset your password: " . $resetLink;
            $headers = "From: no-reply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['message'] = "A password reset link has been sent to your email address.";
            } else {
                $_SESSION['message'] = "Error sending reset email. Please try again.";
            }
        } else {
            $_SESSION['message'] = "No account found with that email address.";
        }

        $conn->close();
    }
    ?>
</body>
</html> -->

<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h1 style="  margin: 2%;">Forget Password</h1>
    <div class="container" style="  margin: 2%;">
        <form action="# " method="get ">
            <div>

                <input type="text" placeholder="Email/Mobile number">
            </div>
            <div>

                <input type="text" placeholder="verification code">
            </div>
            <div>

                <button type="submit">get otp</button><br><br>
            </div>
            <div>

                <button type="submit" class="btn btn-primary" style="max-width: 20%;">Verify</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
</body>

</html> -->


<!-- //session_start();


// Handle form submission before HTML output
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendResetLink($email);
    } else {
        $_SESSION['message'] = "Please enter a valid email address.";
        header("Location: forgot_password.php");
        exit();
    } -->
}

<!-- // Function to handle sending the reset email
function sendResetLink($email) {
    // Database connection (use env variables in production)
    $conn = new mysqli("localhost", "username", "password", "database");

    if ($conn->connect_error) {
        $_SESSION['message'] = "Database connection failed.";
        header("Location: forgot_password.php");
        exit();
    } -->

    <!-- // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Create token
        $token = bin2hex(random_bytes(16));
        $expiry = time() + 3600;

        // Store token and expiry
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sis", $token, $expiry, $email);
        $stmt->execute();

        // Send reset email
        $resetLink = "http://yourwebsite.com/reset.php?token=" . urlencode($token);
        $subject = "Password Reset Request";
        $message = "Hi,\n\nTo reset your password, click the link below:\n$resetLink\n\nIf you didn’t request this, please ignore this email.\n\nThanks!";
        $headers = "From: no-reply@yourwebsite.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8";

        if (mail($email, $subject, $message, $headers)) {
            $_SESSION['message'] = "A password reset link has been sent to your email.";
        } else {
            $_SESSION['message'] = "Unable to send email. Please try again later.";
        }
    } else {
        $_SESSION['message'] = "No account found with that email.";
    }

    $conn->close();
    header("Location: forgot_password.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Forgot Password</h2>
    
//     if (isset($_SESSION['message'])) {
//         echo "<p>" . htmlentities($_SESSION['message']) . "</p>";
//         unset($_SESSION['message']);
//     }
//     ?>
//     <form action="forgot_password.php" method="POST">
//         <label for="email">Enter your email:</label>
//         <input type="email" id="email" name="email" required>
//         <button type="submit" name="submit">Send Reset Link</button>
//     </form>
// </div>
// </body>
// </html> -->
