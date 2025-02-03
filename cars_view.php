<?php
include 'car_functionalities.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_car"])) {
        $id = $_POST["car_id"];
        if (delete($id)) {
            header("Location: cars_view.php");
            exit();
        } else {
            echo "Error deleting car.";
        }
    } elseif (isset($_POST["edit_car"])) {
        $id = $_POST["car_id"];
        header("Location: edit_car_admin.php?id=$id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cars Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center;
        }

        .card {
            width: 18rem;
            padding: 10px;
            margin: 20px;
            height: 500px;
        }

        img {
            width: 50%;
            height: 50%; 
            border-radius: 20px;
        }
        h2{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cars Mangement</a>
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
    <h2>Cars Gallery</h2>
    <div class="card-container">
        <?php
        $cars = retrieve();

        foreach ($cars as $car) {
            echo '<div class="card">';
            echo '<img src="uploads/' . $car["image"] . '" alt="' . $car["model"] . '" class="card-img-top">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $car["model"] . '</h5>'; 
            echo '<p class="card-text">' . $car["year"] . '</p>';
            echo '<p class="card-text">' . $car["price"] . ' $ /day</p>';
            echo '<p class="card-text">' . $car["type"] . '</p>';
            echo '<p class="card-text">' . $car["status"] . '</p>'; 
            echo '</div>'; 
            echo '<div class="edit-delete-buttons">';
            echo '<form method="post">';
            echo '<input type="hidden" name="car_id" value="' . $car["id"] . '">';
            echo '<button type="submit" name="edit_car" class="btn btn-secondary">Edit</button>';
            echo '<button type="submit" name="delete_car" class="btn btn-danger">Delete</button>';
            echo '</form>';
            echo '</div>'; 
            echo '</div>'; 
        }
        ?>
    </div>
    <a class="btn btn-primary" href="Admin.php" role="button">Back</a>

</body>
</html>
