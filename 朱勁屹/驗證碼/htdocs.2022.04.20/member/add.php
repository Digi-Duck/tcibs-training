<?php
require('setup.php');

$userName = $_POST['userName'];
$account = $_POST['account'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "INSERT INTO `member`(`userName`, `account`, `password`, `level`) VALUES ('$userName','$account','$password','$level')";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/member.php');