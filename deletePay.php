<?php 
include "config.php";
$payId= $_GET['id'];

$sql = "DELETE FROM `payment` WHERE `id` = '$payId'";

if ($conn->query($sql) === TRUE) {
    header("Location: users.php?name=".$username."&success=true");
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}
?>