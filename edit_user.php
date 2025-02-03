<?php 
include ("config.php");
$userId= $_POST['user_id'];
$userName = $_POST['name'];
$email = $_POST['email'];
$pass= $_POST['Pass'];
    $DOB= $_POST['DOB'];
    $Gender= $_POST['Gender'];
    $pn= $_POST['Phonenum'];

$sql = "UPDATE `user` SET `username` = '$userName', `email` = '$email', `password` = '$pass', `DOB` = '$DOB', `gender` = '$Gender', `phonenumb` = '$pn' WHERE `user`.`id` = $userId";

if ($conn->query($sql) === TRUE) {
    header("Location: users.php?name=".$userName."&success=true");
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}
?>