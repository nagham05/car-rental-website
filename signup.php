<!DOCTYPE html>

<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumb'];
    $dob = $_POST['dob'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "INSERT INTO user (username, email, password, dob, gender, phonenumb)
            VALUES ('$username', '$email', '$password', '$dob', '$gender','$phonenumber')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #4c5b6c; 
      overflow: hidden;
      margin: 0; 
      padding: 0; 
    }

    .container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    padding: 0 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
    background-color: rgba(26, 188, 156, 0.2); 
    }

    .container header {
    font-size: 30px;
    color: #fff;
    background: #4c5b6c;
    border-radius: 5px 5px 0 0;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    }

    .wrapper {
    width:  70%;
    height: 100%;
    max-width: 100%; 
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
    padding: 20px; 
    }

    .wrapper .title {
      height: 90px;
      background: #3b4859;
      border-radius: 5px 5px 0 0;
      color: #fff;
      font-size: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper .form {
      padding: 20px;
    
    }

    .wrapper form .input-box {
      width: 100%;
      margin-top: 20px;
    }

    .wrapper form .input-box label {
      color: #000; 
    }

    .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    padding-left: 60px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    font-size: 16px;
    transition: all 0.3s ease;
    }

    .input-box input:focus {
    border-color: #3b4859;
    box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
    }

    .input-box input::placeholder {
      color: #999;
    }

    .row i {
    position: absolute;
    width: 47px;
    height: 100%;
    color: #fff;
    font-size: 18px;
    background: #3b4859;
    border: 1px solid #3b4859;
    border-radius: 5px 0 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .row {
    position: relative;
    }

    .pass {
    margin: -8px 0 20px 0;
    }

    .pass a {
    color: #3b4859;
    font-size: 17px;
    text-decoration: none;
    }

    .pass a:hover {
    text-decoration: underline;
    }

    .button {
    text-align: center; 
    }

    .button input {
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding: 0.5em 1em;
    background: #3b4859;
    border: 1px solid #3b4859;
    border-radius: 5px; 
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%; 
    box-sizing: border-box; 
    }

    .wrapper form .button input:hover {
      background: #4c5b6c;
    }

    .wrapper form .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 17px;
    }

    .wrapper form .signup-link a {
      color: #3b4859;
      text-decoration: none;
    }

    .wrapper form .signup-link a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Registration Form</span></div>
      <form action="" class="form" method="post">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name="username" required />
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input type="email" placeholder="Enter email address" name="email" required />
        </div>
        <div class="input-box">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required />
        </div>
        <div class="input-box">
          <label>Phone Number</label>
          <input type="text" placeholder="Enter phone number" name="phonenumb" required />
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" placeholder="Enter birth date" name="dob" required />
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked value='Male'/> 
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="Female" />
              <label for="check-female">Female</label>
            </div>
          </div>
        </div>
        <div class="row button">
          <input type="submit" value="Submit">
        </div>
        <div class="signup-link">Already a member? <a href="login.php">Login now</a></div>
      </form>
    </div>
  </div>
</body>
</html>
