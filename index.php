<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Community – Start Your Coding Journey 🚀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(4, 2, 14);
        }
    </style>
</head>

<body>
    <?php include  'child/_dbconnect.php';   ?>
    <?php include  'child/_header.php';   ?>


    <!-- start slider -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/slider-1.jpg" class="d-block w-100" alt="..." style="height: 25rem;">
            </div>
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/slider-2.avif" class="d-block w-100" alt="..." style="height: 25rem;">
            </div>
            <div class="carousel-item " data-bs-interval="3000">
                <img src="img/slider-3.jpg" class="d-block w-100" alt="..." style="height: 25rem;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>




    <!-- heading -->
    <div class="container">
        <h1 class="text-center my-4" style="color:white;">Welcome to Coding Community You Can Start Your Coding Journey 🚀</h1>
       <div class = "text-center my-4" style = "color:white;"> Join a vibrant hub of aspiring and experienced developers. Learn, build, and grow together through hands-on projects, coding challenges, and real-time support. Whether you're a beginner or looking to sharpen your skills, your journey starts here.</div>
        <div class="row">
            <!-- to fetch all data from database -->
            <?php
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cate = $row['category_name'];
                $desc = $row['category_description'];

                echo ' <div class="col-md-4 my-3">
                     <div class="card" style=" width: 18rem;">
                     <img src="img/card-' . $id . '.jpg"" class="card-img-top" alt="..."style="height: 12rem;">
                     <div class="card-body">
                     <h5 class="card-title"><a href ="threadlist.php?cateid=' . $id . '">' . $cate . ' </a></h5>
                     <p class="card-text">' . substr($desc, 0, 90) . '</p>
                    <a href="threadlist.php?cateid=' . $id . '" class="btn btn-primary">view Threds</a>
                        </div>
                     </div>
                </div>';
            }
            ?>
        </div>

        <?php include  'child/_footer.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      -->
</body>

</html>