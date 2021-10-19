<?php
session_start();
$current_user=$_SESSION['arr'];

echo $current_user['username'];
?>