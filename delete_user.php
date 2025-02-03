<?php 
include "config.php";
$userId= $_GET['id'];

$sql = "DELETE FROM `user` WHERE `id` = '$userId'";

if ($conn->query($sql) === TRUE) {
    header("Location: users.php?name=".$username."&success=true");
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}
?>