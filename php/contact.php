<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../images/nitc.png"/>
        <script src="https://kit.fontawesome.com/d8c4acb3b9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/contact.css">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
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

        <section class="contact">
            <div class="content">
                <h2>Contact Us</h2><br>
            </div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3912.1796099684184!2d75.931447212893!3d11.321579091952978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba642fd50000001%3A0xbe8a77db953bda6c!2sNIT%20Calicut!5e0!3m2!1sen!2sin!4v1585373261153!5m2!1sen!2sin" width="65%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <div class="container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>National Institute of Technology Calicut,<br>
                                NIT Campus P.O 673 601,<br>
                                Kozhikode, India</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>+91 63758 93720</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>support@webcoursera.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form>
                        <h2>Send Message</h2><br>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>&nbsp;Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="" required="required">
                            <span>&nbsp;Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>&nbsp;Type your Message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
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