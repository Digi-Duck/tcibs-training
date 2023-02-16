<?php
@session_start();
require('setup.php');

if(isset($_SESSION['user'])){
    $time = date('Y-m-d H:i:s');
    $id = $_SESSION['id'];
    $sql = "INSERT INTO `log-record`(`userId`, `step`, `time`) VALUES ('$id','0','$time')";
    mysqli_query($connect, $sql);
    @session_destroy();
    header('Location:index.php');
}