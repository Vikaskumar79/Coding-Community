<?php include  'child/_dbconnect.php';   ?>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Please enter a valid email address.";
        header("Location: forgot_password_form.php");
        exit();
    }

    // DB connection (change credentials accordingly)
    // $conn = new mysqli("localhost", "username", "password", "database");
    if ($conn->connect_error) {
        $_SESSION['message'] = "Database connection failed.";
        header("Location: forgot_password_form.php");
        exit();
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


   if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $token = bin2hex(random_bytes(16)); // 32-character secure token
    $expiry = time() + 3600; // 1 hour from now

    // Store token and expiry time in the database
    $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE user_email = ?");
    $stmt->bind_param("sis", $token, $expiry, $email);
    $stmt->execute();



        // Email content
        $resetLink = "http://yourwebsite.com/reset.php?token=" . urlencode($token);
        $subject = "Reset Your Password";
        $message = "Hello,\n\nTo reset your password, click the link below:\n\n$resetLink\n\nThis link will expire in 1 hour.\n\nIf you did not request a password reset, you can safely ignore this email.\n\n- Coding Community Team";
        $headers = "From: no-reply@yourwebsite.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8";

        if (mail($email, $subject, $message, $headers)) {
            $_SESSION['message'] = "A password reset link has been sent to your email.";
        } else {
            $_SESSION['message'] = "Failed to send reset email. Please try again.";
        }
    } else {
        $_SESSION['message'] = "No account found with that email address.";
    }

    $conn->close();
    header("Location: forgot_password_form.php");
    exit();
} else {
    header("Location: forgot_password_form.php");
    exit();
}
?>
