<?php
    echo "Hello";
    session_start();
    $host='localhost';
    $user='root';
    $db='webcoursera';
    $user_id = $_SESSION['arr']['id'];
    $connection=new mysqli($host,$user,'',$db);
    $checkbox_bit = $_COOKIE['checkbox'];
    $video_id = $_COOKIE['clicked_video'];
    $course_id = $_SESSION['course'];
    $cmd = "UPDATE `user_videos` SET `checkbox` = b'$checkbox_bit' WHERE `user_videos`.`user_id` = $user_id AND `user_videos`.`video_id` = $video_id;";
    echo $cmd;
    $sql=$connection->prepare($cmd);
    $sql->execute();
    $sql->close(); 

    $cmd = "SELECT * from videos where course_id=$course_id";
    $result = mysqli_query($connection,$cmd);
    $flag = 1;
    $video_ids = [];
    while($row = mysqli_fetch_assoc($result)) {
        array_push($video_ids,$row['id']);
    }
    foreach($video_ids as $id){
        $cmd = "SELECT * from user_videos where user_id=$user_id and video_id=$id";
        $result = mysqli_query($connection,$cmd);
        $arr = mysqli_fetch_array($result);
        $checkbox = $arr['checkbox'];
        echo $id;
        echo "<br>";
        echo $checkbox;
        if($checkbox == '0' || $checkbox == 0){
            $flag = 0;
        }
    }
    echo '<br><br>';
    echo $flag;
    if($flag == 1){
        setcookie('checkbox', -1, time() + 30, "/WebCoursera/php");
        echo "Cookie Set<br>";
        
        $cmd = "DELETE FROM `user_courses` WHERE `user_courses`.`user_id` = $user_id AND `user_courses`.`course_id` = $course_id";
        $sql=$connection->prepare($cmd);
        $sql->execute();
        $sql->close();


        foreach($video_ids as $id){
            $cmd = "DELETE FROM `user_videos` WHERE `user_videos`.`user_id` = $user_id AND `user_videos`.`video_id` = $id";
            $sql=$connection->prepare($cmd);
            $sql->execute();
            $sql->close();
        }
    }
    
    $connection->close();
    
?>
