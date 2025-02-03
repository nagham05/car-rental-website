<?php
    include("config.php");

    $username= $_POST['name'];
    
    $email= $_POST['email'];
    $mess=$_POST['message'];

    $sql="INSERT INTO support (name,email,message) VALUES ('$username','$email','$mess');";
    if ($conn->query($sql) === TRUE) {
        header("Location: Support.php?name='$username'&success=true");
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
?>
