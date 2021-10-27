<?php
    $course_name = $_GET['course'];
    session_start();
    if(!isset($_SESSION['arr'])){
        $_SESSION['redirect'] = 1;
        $_SESSION['redirect_url'] = "http://localhost/WebCoursera/php/course.php?course=$course_name";
        header("Location:http://localhost/WebCoursera/php/login.php");
    }
    else{
        $host='localhost';
        $user='root';
        $db='webcoursera';
        $_SESSION['redirect'] = 0;
        $_SESSION['redirect_url'] = '';
        $user_id = $_SESSION['arr']['id'];
        $connection=new mysqli($host,$user,'',$db);
        $cmd = "SELECT * from courses where name='$course_name'";
        $result = mysqli_query($connection, $cmd);
        $arr = mysqli_fetch_array($result);
        $course_id = $arr['id'];
        $_SESSION['course'] = $course_id;
        $cmd = "SELECT * from user_courses where user_id = '$user_id' and course_id = '$course_id'";
        $result = mysqli_query($connection,$cmd);
        $count=mysqli_num_rows($result);
        if($count == 0){
            $cmd = "INSERT INTO `user_courses` (`user_id`, `course_id`) VALUES ('$user_id', '$course_id');";
            $sql=$connection->prepare($cmd);
            $sql->execute();
            $sql->close();
    
            $cmd = "SELECT * FROM videos where course_id = $course_id";
            $result = mysqli_query($connection,$cmd);
            $video_id = [];
            while($row = mysqli_fetch_assoc($result)) {
                array_push($video_id, $row['id']);
            }
            foreach($video_id as $id){
                $cmd = "INSERT INTO `user_videos` (`user_id`, `video_id`) VALUES ('$user_id','$id');";
                $sql=$connection->prepare($cmd);
                $sql->execute();
                $sql->close(); 
            }
        }
        $cmd = "SELECT * FROM videos where course_id = $course_id";
        $result = mysqli_query($connection,$cmd);
        $video_link = [''];
        while($row = mysqli_fetch_assoc($result)) {
            array_push($video_link, $row['source']);
        }
    }
?>
    
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <title><?php echo $course_name; ?></title>
        <link rel = "stylesheet" href = "../css/course.css">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="icon" type="image/png" href="../images/nitc.png"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body onload = "re_render()">
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
                    if(isset($_SESSION['arr'])){ 
                    echo '<li class="navbar__btn"><a href="/WebCoursera/php/logout.php" class="button button1" id="logout">Logout</a></li>';
                    }
                    else{
                    echo '<li class="navbar__btn"><a href="/WebCoursera/php/login.php" class="button" id="login">Login</a></li>\n';
                    echo '<li class="navbar__btn"><a href="/WebCoursera/php/register.php" class="button button1" id="register">Register</a></li>\n';
                    }
                ?>
            </ul>
            </div>
        </nav>
        <br>
        <?php 
            $cmd="SELECT * FROM user_courses where course_id=$course_id;";
            $result=mysqli_query($connection,$cmd);
            $count=mysqli_num_rows($result);
        ?>
        <div class = "heading">
            <h1 class = "main-head"><?php echo $course_name;
            ?> Content</h1>
            <h2 style="float:right; margin-right:10%">Registered Users : <?php echo $count ?></h2>
        </div>
            
        <h1 style = "margin-left: 2.5vw;">Reference Books</h1><br>
        <div class="reference" id="reference">
            <div class="reference__wrapper">      
                <?php
                    $cmd = "SELECT * FROM reference WHERE course_id = $course_id";
                    $references = mysqli_query($connection,$cmd);

                    while($row = mysqli_fetch_assoc($references)) {
                        echo "<div class = 'reference__card'>";
                        echo "<a href = '".$row['source']."'><img src = '".$row['image_source']."'height='250px' width='275px' alt='' srcset=''>";
                        echo "<a href = ".$row['source']."><h2>".$row['name']."</h2></a>";
                        echo "</div>";
                    }
                ?>       
            </div>
        </div>

        <h1 style="margin-left: 2.5vw;">Video Lectures
            <div class = "category-div" style="float:right;">
            <select onchange = "render()" name = "category" id = "category">
                <option value = "all" selected>All</option>
                <option value = "short">Short</option>
                <option value = "medium">Medium</option>
                <option value = "long">Long</option>
            </select>
        </div>  
        </h1>

        <div class = "main-div" >
            <div class = "table-div" style="width: 90%;">
                <table id = "cat-table" cellspacing = "30px"></table>
            </div>
        </div>
        <a href="/WebCoursera/php/course_deregister.php?course=<?php echo $course_name ?>" class="button2" id="deregister" style="margin-left:40%; margin-right:40%">Finish Course</a>
        <!-- Footer Section -->
    <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
            <div class="footer__link--items">
                <a href="terms.php">Terms</a>
            </div>
            <div class="footer__link--items">
                <a href="privacy.php">Privacy Policy</a>
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
                <a href="/" id="footer__logo">WebCoursera</a>
            </div>
            <p class="website__rights">© WebCoursera 2021. All rights reserved</p>
            <div class="social__icons">
                <a href="/" class="social__icon--link" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="/" class="social__icon--link" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="/" class="social__icon--link" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="/" class="social__icon--link" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="/" class="social__icon--link" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
            </div>
        </section>
        </div>
        <?php
            $cmd = "SELECT * FROM videos where course_id=$course_id";
            $result = mysqli_query($connection,$cmd);
            $video_id = [];
            while($row = mysqli_fetch_assoc($result)) {
                array_push($video_id, $row['id']);
            }
            $checkbox = [];
            $covered_duration = [];
            foreach($video_id as $id){
                $cmd = "SELECT * FROM user_videos where user_id='$user_id' and video_id='$id'";
                $result = mysqli_query($connection,$cmd);
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($checkbox, $row['checkbox']);
                    array_push($covered_duration,$row['watch_duration']);
                }
            }

        ?>
        <script>
            var links = JSON.parse('<?php echo json_encode($video_link); ?>');
            console.log(links);
            var checkbox_status = JSON.parse('<?php echo json_encode($checkbox); ?>')
            console.log(checkbox_status);
            var link_id = JSON.parse('<?php echo json_encode($video_id); ?>');
            console.log(link_id);
            var duration_covered = JSON.parse('<?php echo json_encode($covered_duration); ?>');
            console.log(duration_covered);

        </script>
        <?php
            function db_update(){
                $cmd = "INSERT INTO `user_courses` (`user_id`, `course_id`) VALUES (7, 8);";
                $sql=$connection->prepare($cmd);
                $sql->execute();
                $sql->close();
            }
        ?>
        <script src="https://www.youtube.com/iframe_api"></script>
        <script src = "../js/course.js"></script>
        <script src="../js/app.js"></script>
    </body>
</html>
<?php
$connection->close();
?>
    