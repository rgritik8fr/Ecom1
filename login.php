<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <head>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        </head>
        
        <body>
        <?php
include './db.php';

?>
        <?php

if(isset($_POST['submit'])){



  $pass = mysqli_real_escape_string($con,$_POST['pass']
);
  $Email = mysqli_real_escape_string($con,$_POST['username']);
  
  
  $checkcoustmer = "SELECT * FROM `cuser` WHERE email ='$Email'";

  $checkcoustmerquery = mysqli_query($con,$checkcoustmer);
  if(mysqli_num_rows($checkcoustmerquery)>0){
     $fetchcheckcoustmerquery = mysqli_fetch_assoc($checkcoustmerquery);
     $checkPass = $fetchcheckcoustmerquery['pass'];
     $passcheck = password_verify($pass, $checkPass);
     if($passcheck){
       header("location:index.php");
     }
     else echo '<script>alert("user and pass invalid")</script>'; 


  }
  else echo '<script>alert("user and pass invalid")</script>';
  
 
}
        ?>
          <div class="container">
          <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method ="post">
              
              <div class="title">Login</div>
              <div class="input-box">
                <input type="text" name ="username" placeholder="Enter your Email" required>
              <div class="underline"></div>
              </div>
              
              <div class="input-box">
                <input type="password"name ="pass" placeholder="Enter your Password" required>
              <div class="underline"></div>
              </div>
              
              <div class="input-box button">
                <input type="submit" name ='submit' value="Continue">
              </div>
              
            </form>
            <div class="option">or Connect with Social Media</div>
            <div class="twitter">
              <a href="#"><i class="fab fa-twitter"></i>Login with Twitter</a>
            </div>
            <div class="facebook">
              <a href="#"><i class="fab fa-facebook-f"></i>Login with Facebook</a>
            </div>
            <p>if you don't have an account? <a href="./signup.php">Signup</a></p>

          </div>
        </body>
        
</html>



