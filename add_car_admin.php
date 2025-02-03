<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #e3f2fd; /* Background color */
            color: #000000; /* Text color */
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .container {
            background-color: #ffffff; /* Container background color */
            border-radius: 10px; /* Rounded corners */
            padding: 20px; /* Padding inside container */
            margin: 20px auto; /* Center the container */
            max-width: 600px; /* Limit container width */
        }
        .btn-primary {
            background-color: #1976d2; /* Primary button background color */
            border-color: #1976d2; /* Primary button border color */
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #1565c0; /* Hover background color */
            border-color: #1565c0; /* Hover border color */
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cars Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="cars_view.php">View Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_car_admin.php">Add Cars</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<h2>Add Car</h2>
<div class="container">

    <?php
    if (isset($_SESSION["message"]) && is_array($_SESSION["message"])) {
        echo "<div id='message'>" . $_SESSION["message"]["text"] . "</div>";

        // Check if 5 seconds have passed since the message was set
        if (time() - $_SESSION["message"]["timestamp"] >= 5) {
            unset($_SESSION["message"]);
        } else {
            echo "<script>
                    setTimeout(function() {
                        document.getElementById('message').style.display = 'none';
                    }, 5000); // 5000 milliseconds = 5 seconds
                  </script>";
        }
    }
    ?>
    <form action="uploadcar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="carid">
        <input type="file" name="image" class="form-control" required><br><br>
        Model: <input type="text" name="model" class="form-control"  required><br><br>
        Year: <input type="number" name="year" class="form-control"  required><br><br>
        Price: <input type="number" name="price"class="form-control"  required><br><br>
        Type: <input type="text" name="type" class="form-control" required ><br><br>
        Status: <input type="text" name="status" class="form-control" required><br><br>
        <input type="submit" value="Add Car" name="submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>

