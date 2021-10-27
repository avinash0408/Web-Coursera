<?php
    session_start();
    $current_user=$_SESSION['arr'];

    header("Location:http://localhost/WebCoursera/index.php");
?>