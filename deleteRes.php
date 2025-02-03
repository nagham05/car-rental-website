<?php 
include "config.php";
$ResId= $_GET['id'];

$sql = "DELETE FROM `reservation` WHERE `id` = '$resId'";

if ($conn->query($sql) === TRUE) {
    header("Location: reservation.php?name=".$authorName."&success=true");
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}
?>