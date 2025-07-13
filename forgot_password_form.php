<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Forgot Password</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . htmlentities($_SESSION['message']) . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <form action="forgot_password.php" method="POST">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="submit">Send Reset Link</button>
    </form>
</div>
</body>
</html>
