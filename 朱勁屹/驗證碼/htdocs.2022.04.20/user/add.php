<?php
require('setup.php');

@session_start();
$userId = $_SESSION['id'];

$workName = $_POST['workName'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$dealWith = $_POST['dealWith'];
$level = $_POST['level'];
$workContent = $_POST['workContent'];
$date = $_POST['date'];

$sql = "INSERT INTO `to-do-work`(`workName`, `startTime`, `endTime`, `dealWith`, `level`, `workContent`, `date`, `userId`) VALUES ('$workName','$startTime','$endTime','$dealWith','$level','$workContent','$date','$userId')";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/user.php');