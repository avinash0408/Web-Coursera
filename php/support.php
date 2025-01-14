<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Help and Support</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../images/nitc.png"/>
        <script src="https://kit.fontawesome.com/d8c4acb3b9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/contact.css">
        <link rel="stylesheet" type="text/css" href="../css/support.css">
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
            <div class="container">
                <div class="contactForm">
                    <form>
                        <div class="content">
                            <h2>Enter your Query</h2><br>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>&nbsp;Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="" required="required">
                            <span>&nbsp;Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>&nbsp;Subject</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>&nbsp;Type your Message...</span>
                        </div>
                        <div class="inputBox">
                            <div class="drag-area">
                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <header>Attach Screenshot if any</header>
                                <button>Browse File</button>
                                <input type="file" hidden>
                            </div>
                        </div>
                        
                        <!-- <script src="script.js"></script> -->

                        <div class="inputBox">
                            <input type="submit" name="" value="Send Message">
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