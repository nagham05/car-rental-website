<?php
session_start();
$basePath = __DIR__;

if (isset($_POST["submit"])) {
    include 'config.php';

    $model = $_POST["model"];
    $year = $_POST["year"];
    $price = $_POST["price"];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $imageTmpName = $_FILES["image"]["tmp_name"];
    $imageType = $_FILES["image"]["type"];

    $imageExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imageName = $model . '.' . $imageExtension;

    $targetDir = $basePath . '/uploads/';
    $targetFile = $targetDir . $imageName;

    $select_car_model = mysqli_query($conn, "SELECT model FROM `car` WHERE model = '$model'") or die('query failed');

    if (mysqli_num_rows($select_car_model) > 0) {
        $_SESSION["message"] = array(
            "text" => "Car already added",
            "timestamp" => time() 
        );
    } else {
        if (move_uploaded_file($imageTmpName, $targetFile)) {
            $add_car_query = "INSERT INTO car (model, year, price, type, status, image) VALUES ('$model', '$year', '$price' , '$type', '$status','$imageName')";
            if ($conn->query($add_car_query) === true) {
                $_SESSION["message"] = array(
                    "text" => "Car added successfully.",
                    "timestamp" => time() 
                );
            } else {
                $_SESSION["message"] = array(
                    "text" => "Error: " . $add_car_query . "<br>" . $conn->error,
                    "timestamp" => time() 
                );
            }
        } else {
            $_SESSION["message"] = array(
                "text" => "Error uploading image.",
                "timestamp" => time() 
            );
        }
    }
    header("Location: add_car_admin.php");
    exit();
}
?>
