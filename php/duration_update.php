<?php
    echo "Hello";
    session_start();
    $host='localhost';
    $user='root';
    $db='webcoursera';
    $user_id = $_SESSION['arr']['id'];
    $connection=new mysqli($host,$user,'',$db);
    $duration = $_COOKIE['duration'];
    $video_id = $_COOKIE['clicked_video'];
    $course_id = $_SESSION['course'];
    
    $cmd = "UPDATE `user_videos` SET `watch_duration` = '$duration', `checkbox` = b'0' WHERE `user_videos`.`user_id` = $user_id AND `user_videos`.`video_id` = $video_id;";
    $sql=$connection->prepare($cmd);
    $sql->execute();
    $sql->close(); 

    if($duration > 300){
        $cmd = "UPDATE `user_videos` SET `checkbox` = b'1' WHERE `user_videos`.`user_id` = $user_id AND `user_videos`.`video_id` = $video_id;";
        $sql=$connection->prepare($cmd);
        $sql->execute();
        $sql->close(); 
        setcookie('checkbox', -1, time() + 90, "/WebCoursera/php");
    }
    else{
        setcookie('checkbox', 2, time() + 90, "/WebCoursera/php");
    }
    $connection->close();
    
?>
