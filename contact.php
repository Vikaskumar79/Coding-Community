<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iConnect - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #02023c;
        }

        .contact-container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.3);
            margin: 50px auto;
            position: relative;
        }
       


       
    </style>
</head>

<body>
    <?php include  'child/_dbconnect.php';   ?>
    <?php include  'child/_header.php';   ?>
    
    <div class="contact-container  my-3 " style=" min-height:74vh;">
        <form action="/forums/child/_handlecontact.php" method="post">
            <h1 class="text-center"style="color:black;">Contact Us</h1>
            <div class="mb-3">
                <label for="First Name" class="form-label" style="color:black;">Full Name</label>
                <input type="text " class="form-control" id="firstname" name="firstname" placeholder="Enter your  name" required>
            </div>

            <div class="mb-3">
                <label for="Mobile Number" class="form-label"style="color:black;">Mobile Number</label>
                <input type="Mobile Number" class="form-control" id="number" name="number" placeholder="Enter your mobile number" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"style="color:black;">Email address</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email" required aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text" style="color:blue;"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputAddress" class="form-label"style="color:black;">Address</label>
                <input type="text" class="form-control" id="addr" name="addr" placeholder="Enter your Address"required>
            </div>
            <div class="mb-3">
                <label for="exampleInputAge" class="form-label"style="color:black;">Age</label>
                <input type="number" class="form-control" id="age" name="age"placeholder="Enter your age"required>
            </div>
            <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"style="color:black;">Problem</label>
  <textarea class="form-control" id="problem" name="problem" rows="3" placeholder="Your request"required></textarea>
</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include  'child/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
