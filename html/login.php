<?php
session_start();
    $host='localhost';
    $user='root';
    $db='webcoursera';
    $er='';
    if(isset($_POST['submit'])){
        $connection=new mysqli($host,$user,'',$db);
        $email=$_POST['email'];
        $check_mail="SELECT * FROM users WHERE email='$email'";
        $result_mail=mysqli_query($connection,$check_mail);
        $arr=mysqli_fetch_array($result_mail);

        if($arr && password_verify($_POST['password'],$arr['enc_password'])){
          $_SESSION['arr']=$arr;
        header("Location:http://localhost/Web-Coursera/html/landing.php");
        }
        else{
          $er='Invalid Login..Please try again..!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/home.css"/>
    <link rel="icon" type="image/png" href="../images/nitc.png"/>
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
          <li class="navbar__item"><a href="categories.html" class="navbar__links" id="about-page">Categories</a></li>
          <li class="navbar__btn"><a href="login.php" class="button" id="login">Login</a></li>
          <li class="navbar__btn"><a href="register.php" class="button button1" id="register">Register</a></li>
      </ul>
      </div>
  </nav>

      <div class="form-div">
        <form action="login.php" method="post" class="form">
       <h1>Login</h1>
       <div class="inputs">
       <input type="email" name="email" id="" placeholder="E-mail address" class="user_input" required>
       <input type="password" name="password" id="" placeholder="Password" class="user_input" required>
       <small class="error" style="color:red">
       <?php
            if($er) echo $er;
       ?> 
       </small>
       </div>

       <input type="submit" value="Login" name="submit">
       <div class="links">
           <a href="login.php">Forgot Password?</a>
       </div>
       <div class="soc_head">
           <div class="left"></div>
           <div class="mid">Login with</div>
           <div class="right"></div>
       </div>
       <div class="soc_media">
        <a href="#" class="fab fa-facebook"></a> 
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-google"></a>
       </div>
        </form>
    </div>
<!-- Footer Section -->
<div class="footer__container">
    <div class="footer__links">
      <div class="footer__link--wrapper">
        <div class="footer__link--items">
          <a href="terms.html">Terms</a>
        </div>
        <div class="footer__link--items">
          <a href="policy.html">Privacy Policy</a>
        </div>
        <div class="footer__link--items">
          <a href="support.html">Help and Support</a>
        </div>
        <div class="footer__link--items">
          <a href="about.html">About Us</a>
        </div>
        <div class="footer__link--items">
          <a href="contact.html">Contact Us</a>
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
