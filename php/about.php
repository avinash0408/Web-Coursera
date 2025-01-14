<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/nitc.png"/>
	<link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <script src="https://kit.fontawesome.com/d8c4acb3b9.js" crossorigin="anonymous"></script>
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
            <?php
              session_start();
            if(isset($_SESSION['arr'])){ 
              echo '<li class="navbar__btn"><a href="logout.php" class="button button1" id="logout">Logout</a></li>';
            }
            else{
              echo '<li class="navbar__btn"><a href="login.php" class="button" id="login">Login</a></li>';
              echo '<li class="navbar__btn"><a href="register.php" class="button button1" id="register">Register</a></li>';
            }
          ?>
        </ul>
        </div>
    </nav>

    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h1>Our Team</h1>
                </div>
            </div>
            <div class="row">
                <div class="team-items">
                    <div class="item">
                        <img src="../images/team-1.jpg" height="330" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Yacha Venkata Rakesh</h5>
                                <h6>B180427CS</h6>
                                <span class="fas fa-phone-alt"></span>
                                <span class="phone">+91 79976 69577</span>
                                <br>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/yvrakesh7"><span class="fa fa-facebook"></span></a>
                                    <a href="https://twitter.com/yvrakesh7"><span class="fa fa-twitter"></span></a>
                                    <a href="https://www.linkedin.com/in/yvrakesh/"><span class="fa fa-linkedin"></span></a>
                                    <a href="https://www.instagram.com/yvrakesh7/"><span class="fa fa-instagram"></span></a>
                                    <a href="mailto:venkatarakesh1234y@gmail.com"><span class="fas fa-envelope"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../images/team-2.jpg" height="330" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Dommeti Sree Gnanesh</h5>
                                <h6>B180440CS</h6>
                                <span class="fas fa-phone-alt"></span>
                                <span class="phone">+91 79814 78196</span>
                                <br>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/gnanesh.dommeti"><span class="fa fa-facebook"></span></a>
                                    <a href="https://github.com/GnaneshGnani"><span class="fa fa-github"></span></a>
                                    <a href="https://www.linkedin.com/in/sree-gnanesh-dommeti-a801911b5"><span class="fa fa-linkedin"></span></a>
                                    <a href="https://www.instagram.com/_gnanesh_gnani/"><span class="fa fa-instagram"></span></a>
                                    <a href="mailto:gnanesh.dometti@gmail.com"><span class="fas fa-envelope"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../images/team-3.jpeg" height="330" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Samudrala Avinash</h5>
                                <h6>B180409CS</h6>
                                <span class="fas fa-phone-alt"></span>
                                <span class="phone">+91 79959 55054</span>
                                <br>
                                <div class="social-links">
                                    <a href="https://m.facebook.com/avinashsamudrala123456789"><span class="fa fa-facebook"></span></a>
                                    <a href="https://twitter.com/_avinash0801"><span class="fa fa-twitter"></span></a>
                                    <a href="https://www.linkedin.com/in/avinash-samudrala-4583511b3"><span class="fa fa-linkedin"></span></a>
                                    <a href="https://www.instagram.com/_avinash_samudrala/"><span class="fa fa-instagram"></span></a>
                                    <a href="mailto:avinash.08jan2001@gmail.com"><span class="fas fa-envelope"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
