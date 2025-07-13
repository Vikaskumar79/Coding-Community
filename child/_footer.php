<!-- <div class="container-fluid bg-dark text-light">
<p class="text-center mb-0" >@ copyright iConnect coading forams 2024 | All rights reserved</p>
</div> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding Community – Start Your Coding Journey 🚀</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Custom Footer CSS */
         body {
            background-color: rgb(17, 13, 60);
        } 

        .footer {
            background-color: #212529;
            /* Dark background */
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: relative;
            bottom: 0;
            left: 0
        }

        .footer a {
            color: #ffc107;
            /* Yellow links */
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Footer Section -->
    <footer class="footer container-fluid">
        <p>&copy; <span id="year"></span> Coding Community – Start Your Coding Journey 🚀 | All Rights Reserved</p>
        <p>
            <a href="terms.php">Terms & Conditions</a> |
            <a href="privacy.php">Privacy Policy</a>
        </p>
        <div>
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>
        </div>
    </footer>

    <!-- JavaScript for Dynamic Year -->
    <script>
        document.getElementById("year").innerText = new Date().getFullYear();
    </script>

</body>

</html>