<?php
    include("config.php");

    $username= $_POST['name'];
    $email= $_POST['email'];
    $pass= $_POST['Pass'];
    $DOB= $_POST['DOB'];
    $Gender= $_POST['Gender'];
    $pn= $_POST['Phonenum'];

    $sql="insert into user (username,email,password,DOB,gender,phonenumb) values ('$username', '$email', '$pass','$DOB','$Gender','$pn');";
    if ($conn->query($sql) === TRUE) {
        header("Location: add_user_form.php?name=".$username."&success=true");
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }



?>