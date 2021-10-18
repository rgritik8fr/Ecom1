
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
 
        <?php
include './db.php';

?>
        </head>
        
        <body>
            <?php
if(isset($_POST['submit'])){



    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $name = $_POST['Name'];
    $Email = $_POST['username'];


    $checkcoustmer = "SELECT * FROM `cuser` WHERE email ='$Email'";
    $checkcoustmerquery = mysqli_query($con,$checkcoustmer);
    if(mysqli_num_rows($checkcoustmerquery)>0){
        echo '<script>alert("user already Exist")</script>'; 
    }
    else{

    if($pass==$cpass){
        $spass = password_hash($pass,CRYPT_BLOWFISH);
        $scpass = password_hash($cpass,CRYPT_BLOWFISH);

        $insertSql ="INSERT INTO `cuser`(`name`, `Email`, `pass`, `cpass`) VALUES ('$name','$Email','$spass','$scpass')";
        $insertSqlq =mysqli_query($con , $insertSql);
        if($insertSql){
            header('location:./login.php');
        }
    
else{
    echo '<script>alert("please try after some time")</script>'; 
}


       
    }
    else{
        echo '<script>alert("you password does not maching")</script>';
    }
}
}
            ?>


          <div class="container">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method ="post">
              
              <div class="title">Signup</div>
              <div class="input-box">
                <input type="text" name ="Name" placeholder="Enter your Name" required>
              <div class="underline"></div>
              </div>
              

              <div class="input-box">
                <input type="text" name ="username" placeholder="Enter your Email" required >
              <div class="underline"></div>
              </div>
              
              <div class="input-box">
                <input type="password" name ="pass" placeholder="Enter your Password" required>
              <div class="underline"></div>
              </div>

              
              <div class="input-box">
                <input type="password" name ="cpass" placeholder="Confirm your Password" required>
              <div class="underline"></div>
              </div>
              
              <div class="input-box button">
                <input type="submit" name="submit" value="Continue">
              </div>
              
            </form>
            <div class="option">or Connect with Social Media</div>
            <div class="twitter">
              <a href="#"><i class="fab fa-twitter"></i>Login with Twitter</a>
            </div>
            <div class="facebook">
              <a href="#"><i class="fab fa-facebook-f"></i>Login with Facebook</a>
            </div>
            <p>if you have an account? <a href="./login.php" class="text-decoration-none">Signup</a></p>

          </div>
        </body>
        
</html>