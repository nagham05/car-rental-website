<?php
include 'car_functionalities.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $car = getImageById($id);

    if ($car) {
        $model = $car['model'];
        $year = $car['year'];
        $price = $car['price'];
        $type = $car['type'];
        $status = $car['status']; // Retrieve status value
        $image = $car['image'];
    } else {
        echo "Car not found.";
        exit();
    }
} else {
    echo "ID not provided.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve edited data from the form
    $newmodel = $_POST['model'];
    $newyear = $_POST['year'];
    $newprice = $_POST['price'];
    $newtype = $_POST['type'];
    $newstatus = $_POST['status']; // Retrieve edited status value

    // Check if a new image is uploaded
    if ($_FILES['new_image']['name'] != '') {
        // If new image uploaded, handle file upload
        $target_dir = "uploads/";
        $new_image_name = basename($_FILES["new_image"]["name"]);
        $target_file = $target_dir . $new_image_name;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Upload new image
        if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
            // Update car details with new image and edited status
            if (edit($id, $newmodel, $newyear, $newprice, $newtype, $newstatus, $new_image_name)) {
                // If update successful, redirect to cars_view.php
                header("Location: cars_view.php");
                exit();
            } else {
                echo "Error updating car.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // If no new image uploaded, update car details without changing image and with edited status
        if (edit($id, $newmodel, $newyear, $newprice, $newtype, $newstatus, $image)) {
            // If update successful, redirect to cars_view.php
            header("Location: cars_view.php");
            exit();
        } else {
            echo "Error updating car.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd; /* Background color */
            color: #000000; /* Text color */
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            background-color: #ffffff; /* Form background color */
            border-radius: 10px; /* Rounded corners */
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
        }
        input[type="text"], input[type="number"], input[type="file"], input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #1976d2; /* Primary button background color */
            border-color: #1976d2; /* Primary button border color */
            color: #fff; /* Button text color */
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1565c0; /* Hover background color */
            border-color: #1565c0; /* Hover border color */
        }
    </style>
</head>
<body>
    <h2>Edit Car</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            Model: <input type="text" name="model" value="<?php echo $model; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            Year: <input type="number" name="year" value="<?php echo $year; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            Price: <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            Type: <input type="text" name="type" value="<?php echo $type; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            Status: <input type="text" name="status" value="<?php echo $status; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="hidden" name="old_image" value="<?php echo $image; ?>"> <!-- Hidden input for old image -->
            New Image: <input type="file" name="new_image" class="form-control-file"> <!-- File input for new image -->
        </div>
        <input type="submit" value="Update Car" name="submit" class="btn btn-primary">
    </form>
</body>
</html>
