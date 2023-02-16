<?php
require('setup.php');

@session_start();
$userId = $_SESSION['id'];

$id = $_POST['id'];
$workName = $_POST['workName'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$dealWith = $_POST['dealWith'];
$level = $_POST['level'];
$workContent = $_POST['workContent'];
$date = $_POST['date'];

$sql = "UPDATE `to-do-work` SET `workName`='$workName',`startTime`='$startTime',`endTime`='$endTime',`dealWith`='$dealWith',`level`='$level',`workContent`='$workContent',`date`='$date',`userId`='$userId' WHERE `id` = $id ";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/user.php');