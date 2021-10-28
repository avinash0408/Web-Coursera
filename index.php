<?php
  session_start();
  $host='localhost';
  $user='root';
  $db='webcoursera';
  $connection=new mysqli($host,$user,'',$db);
  $cmd="SELECT * FROM users";
  $result=mysqli_query($connection,$cmd);
  $count=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebCoursera</title>
    <link rel="icon" type="image/png" href="images/nitc.png"/>
    <link rel="stylesheet" href="css/home.css" />
    <script src="https://kit.fontawesome.com/d8c4acb3b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"/>
  </head>
  <body>
    <!-- Navigation Bar-->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="index.php" id="navbar__logo">WebCoursera</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <div class=" navbar__links search_wrap search_wrap_3">
              <div class="search_box">
                <input type="text" class="input" placeholder="Type to Search" id = 'input' oninput = "search()">
                <div class="btn btn_common">
                  <i class="fas fa-search"></i>
                </div>
              </div>
            </div>
          </li>
          <li class="navbar__item"><a href="index.php" class="navbar__links" id="home-page">Home</a></li>
          <li class="navbar__item"><a href="php/categories.php" class="navbar__links" id="about-page">Categories</a></li>
          <?php
            if(isset($_SESSION['arr'])){ 
              echo '<li class="navbar__btn"><a href="php/logout.php" class="button button1" id="logout">Logout</a></li>';
            }
            else{
              echo '<li class="navbar__btn"><a href="php/login.php" class="button" id="login">Login</a></li>';
              echo '<li class="navbar__btn"><a href="php/register.php" class="button button1" id="register">Register</a></li>';
            }
          ?>
        </ul>
      </div>
    </nav>

    <!-- Services Section -->
    <div class="main-body">
      <div class="services" id="services">
          <br>
          <br>
          <h1>Courses Offered</h1>
          <br>
          <br>
          <div class="services__wrapper" id = "services_wrapper">
          
          </div>
      </div>
      <div class="right-pane">
          <h2>Registered Users : <?php echo $count ?></h2>
          <div style="height: 20px;"></div>
          <ol>
            <?php foreach($result as $user){?>
              <li><?php echo $user['name'] ?></li>
              <?php } ?>
          </ol>
        </div>
    </div>
</div>
    <!-- Footer Section -->
    <div class="footer__container">
      <div class="footer__links">
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <a href="php/terms.php">Terms</a>
          </div>
          <div class="footer__link--items">
            <a href="php/policy.php">Privacy Policy</a>
          </div>
          <div class="footer__link--items">
            <a href="php/support.php">Help and Support</a>
          </div>
          <div class="footer__link--items">
            <a href="php/about.php">About Us</a>
          </div>
          <div class="footer__link--items">
            <a href="php/contact.php">Contact Us</a>
          </div>
        </div>
      </div>
      <section class="social__media">
        <div class="social__media--wrap">
          <div class="footer__logo">
            <a href="index.php">WebCoursera</a>
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
    <?php
      
      $cmd = "SELECT * FROM courses";
      $result = mysqli_query($connection, $cmd);
      $courses = [];
      while($row = mysqli_fetch_assoc($result)) {
        array_push($courses, ["id" => $row['id'], "name" => $row['name'], "enrolled" => 0]);
      }
      if(isset($_SESSION['arr'])){
        $user_id = $_SESSION['arr']['id'];
        $cmd = "SELECT * FROM user_courses where user_id = $user_id";
        $result = mysqli_query($connection, $cmd);
        while($row = mysqli_fetch_assoc($result)) {
          $courses[$row['course_id']-1]['enrolled'] = 1;
        }
      }

      echo "<script>var courses = JSON.parse('";
      echo json_encode($courses); 
      echo "');</script>";
    ?>
	<script src = "js/home.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
