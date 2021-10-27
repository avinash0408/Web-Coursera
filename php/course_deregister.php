<?php
    $course_name = $_GET['course'];
    session_start();
    $host='localhost';
    $user='root';
    $db='webcoursera';
    $user_id = $_SESSION['arr']['id'];
    $connection=new mysqli($host,$user,'',$db);
    $cmd = "SELECT * from courses where name='$course_name'";
    $result = mysqli_query($connection, $cmd);
    $arr = mysqli_fetch_array($result);
    $course_id = $arr['id'];
    
    $cmd = "DELETE FROM `user_courses` WHERE `user_courses`.`user_id` = $user_id AND `user_courses`.`course_id` = $course_id";
    $sql=$connection->prepare($cmd);
    $sql->execute();
    $sql->close();

    $cmd = "SELECT * FROM videos where course_id=$course_id";
    $result = mysqli_query($connection,$cmd);
    $video_ids = [];
    while($row = mysqli_fetch_assoc($result)) {
        array_push($video_ids, $row['id']);
    }

    foreach($video_ids as $id){
        $cmd = "DELETE FROM `user_videos` WHERE `user_videos`.`user_id` = $user_id AND `user_videos`.`video_id` = $id";
        $sql=$connection->prepare($cmd);
        $sql->execute();
        $sql->close();
    }

    $connection->close();

    header("Location:http://localhost/WebCoursera/index.php");
?>