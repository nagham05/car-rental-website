<?php 
include "config.php";
$SuppId= $_GET['id'];

$sql = "DELETE FROM `support` WHERE `id` = '$SuppId'";

if ($conn->query($sql) === TRUE) {
    header("Location: viewsupp.php?name=".$userame."&success=true");
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}
?>