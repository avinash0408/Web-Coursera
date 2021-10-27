<?php
    session_start();
    $host='localhost';
    $user='root';
    $db='webcoursera';
    $flag=0;
    $confirm_flag = -1;
    $errors=array();
    if(isset($_POST['submit'])){
        $connection=new mysqli($host,$user,'',$db);
        $email=$_POST['email'];
        $username=$_POST['username'];
        $phone=$_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if(strcmp($password, $confirm_password) == 0){
            $confirm_flag = 0;
        }
        else{
            $confirm_flag = 1;
        }
        $enc_password=password_hash($password,PASSWORD_DEFAULT);
        $check_mail="SELECT * FROM users WHERE email='$email'";
        $result_mail=mysqli_query($connection,$check_mail);
        if(mysqli_fetch_array($result_mail)){
            $flag=1;
        }
        if($flag == 0 && $confirm_flag == 0){
        $com="INSERT INTO `users` (`email`, `name`, `mobile`, `enc_password`) VALUES('$email','$username','$phone','$enc_password')";
        $sql=$connection->prepare($com);
        $sql->execute();
        $sql->close();
        $connection->close();
        header("Location:http://localhost/WebCoursera/php/login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="icon" type="image/png" href="../images/nitc.png"/>
    <link rel="stylesheet" href="../css/login.css"/>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navigation Bar-->
    <nav class="navbar">
      <div class="navbar__container">
      <a href="../index.php" id="navbar__logo">WebCoursera</a>
      <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
      </div>
      <ul class="navbar__menu">
          <li class="navbar__item">
              <div class=" navbar__links search_wrap search_wrap_3">
                  <div class="search_box">
                  <input type="text" class="input" placeholder="Type to Search">
                  <div class="btn btn_common">
                      <i class="fas fa-search"></i>
                  </div>
                  </div>
              </div>
          </li>
          <li class="navbar__item"><a href="../index.php" class="navbar__links" id="home-page">Home</a></li>
          <li class="navbar__item"><a href="categories.php" class="navbar__links" id="about-page">Categories</a></li>
          <li class="navbar__btn"><a href="login.php" class="button" id="login">Login</a></li>
          <li class="navbar__btn"><a href="register.php" class="button button1" id="register">Register</a></li>
      </ul>
      </div>
  </nav>
      <div class="form-div">
        <form action="register.php" method="post" class="form">
       <h1>SignUp</h1>
       <div class="inputs">
        <input type="email" name="email" id="" placeholder="Enter your Email Address" class="user_input" required>
        <small class="error" style="color:red">
        <?php
                if($flag==1) echo "Account already exists with this email..!"
        ?> 
        </small>
        <input type="text" name="username" id="" placeholder="Enter your Name" class="user_input" required>
        <input type="text" name="phone" id="" placeholder="Enter your Phone Number" class="user_input" required>
        <input type="password" name="password" id="" placeholder="Enter a Strong Password" class="user_input" required>
        <input type="password" name="confirm_password" id="" placeholder="Confirm your Password" class="user_input" required>
        <small class="error" style="color:red">
        <?php
                if($confirm_flag==1) echo "Enter the same password in the Confirm Password section"
        ?> 
        </small>
       </div>

       <input type="submit" value="Register" name="submit">

       <div class="soc_head">
           <div class="left"></div>
           <div class="mid">Signup Using</div>
           <div class="right"></div>
       </div>
       <div class="soc_media">
        <a href="#" class="fab fa-facebook"></a> 
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-google"></a>
       </div>
        <p style="float:left">Already had an account?</p>
        <a href="/WebCoursera/php/login.php" style="float:right;text-decoration:none; font-weight:50; color:black;">Login</a>
        </form>
    </div>
    <!-- Footer Section -->
    <div class="footer__container">
        <div class="footer__links">
        <div class="footer__link--wrapper">
            <div class="footer__link--items">
            <a href="terms.php">Terms</a>
            </div>
            <div class="footer__link--items">
            <a href="policy.php">Privacy Policy</a>
            </div>
            <div class="footer__link--items">
            <a href="support.php">Help and Support</a>
            </div>
            <div class="footer__link--items">
            <a href="about.php">About Us</a>
            </div>
            <div class="footer__link--items">
            <a href="contact.php">Contact Us</a>
            </div>
        </div>
        </div>
        <section class="social__media">
        <div class="social__media--wrap">
            <div class="footer__logo">
            <a href="../index.php">WebCoursera</a>
            </div>
            <p class="website__rights">© WebCoursera 2021. All rights reserved</p>
            <div class="social__icons">
            <a href="https://www.facebook.com/webcoursera/" class="social__icon--link" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/webcoursera/" class="social__icon--link" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/c/webcoursera" class="social__icon--link" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.linkedin.com/in/webcoursera/" class="social__icon--link" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://twitter.com/webcoursera/" class="social__icon--link" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        </section>
    </div>

    <script src="../js/app.js"></script>
  </body>
</html>
