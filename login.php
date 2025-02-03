<!DOCTYPE html>
<?php 
session_start();
include "config.php";
$adminemail = "admin@gmail.com";
$adminpass = "123456";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    if($email === $adminemail && $pass === $adminpass){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        if(isset($_POST['remember_me'])){
            setcookie('email_username',$_POST['email'],time() + (60*60*24));
            setcookie('password',$_POST['password'],time() + (60*60*24));
        }
        header("Location: Admin.php");
        exit();
      
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $email = $conn->real_escape_string($_POST['email']);
      $password = $conn->real_escape_string($_POST['password']);
  
      $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Email and password are valid, start a session
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;

          $row = $result->fetch_assoc();
          $_SESSION['user_id'] = $row['id'];

          if(isset($_POST['remember_me'])){
            setcookie('email_username',$_POST['email'],time() + (60*60*24));
            setcookie('password',$_POST['password'],time() + (60*60*24));
        }
          // Redirect to the search page
          header("Location: index.php");
          exit;
      } else {
          // Invalid email or password
          echo "Invalid email or password. Please try again.";
      }
  
      $conn->close();
  }
      
    else {
        header("Location: index.php");
        exit();
    }
}

if(isset($_COOKIE["email_username"]) && isset($_COOKIE["password"])){
    $id=$_COOKIE["email_username"];
    $pass=$_COOKIE["password"];
} else {
    $id="";
    $pass="";
}
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background: #4c5b6c;
  overflow: hidden;
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
  position: relative; 
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
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
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #3b4859;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
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
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #3b4859;
  border: 1px solid #3b4859;
  cursor: pointer;
}
form .button input:hover{
  background: #4c5b6c;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #3b4859;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}

.back-btn {
    font-size: 14px; 
    letter-spacing: 1px; 
    text-transform: uppercase;
    display: block; 
    text-align: center;
    font-weight: bold;
    padding: 0.3em 1em;
    border: 2px solid #3b4859; 
    border-radius: 5px;
    position: absolute; 
    top: -70px; 
    right: 20px; 
    background-color: white; 
    transition: 0.3s ease all;
    z-index: 1;
}


.back-btn a{
    color: #3b4859; 
    text-decoration: none;

}
.back-btn a:hover{
    color: white;
    background-color: #3b4859;;
}

.back-btn:before {
  transition: 0.5s all ease;
  position: absolute;
  top: 0;
  left: 50%;
  right: 50%;
  bottom: 0;
  opacity: 0;
  content: '';
  background-color: #3b4859;
  z-index: -1;
}

.back-btn:hover, .back-btn:focus {
  color: white; 
  background-color: #3b4859; 
  text-decoration: none; 
}

.back-btn:hover:before, button:focus:before {
  transition: 0.5s all ease;
  left: 0;
  right: 0;
  opacity: 1;
}

.back-btn:active {
  transform: scale(0.95);
}


    </style>
</head>
<body>
<div class="container">
    <div class="back-btn">
        <a href="index.php" class="button">Back to  Home Page</a>
    </div>
    <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="row">
                <i class="fas fa-user"></i>
                <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($id); ?>">
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required value="<?php echo htmlspecialchars($pass); ?>">
            </div>
            <input type="checkbox" name="remember_me" >
           <label for="remember_me">Remember me</label>
            <div class="row button">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
        </form>
    </div>
</div>

</body>
</html>
