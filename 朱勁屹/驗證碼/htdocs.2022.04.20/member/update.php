<?php
require('setup.php');

$id = $_POST['id'];
$userName = $_POST['userName'];
$account = $_POST['account'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "UPDATE `member` SET `userName`='$userName',`account`='$account',`password`='$password',`level`='$level' WHERE `id`='$id'";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/member.php');