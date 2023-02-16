<?php
require('setup.php');

$id = $_POST['id'];

$s = "DELETE FROM `log-record` WHERE `userId`='$id'";
mysqli_query($connect, $s);

$sql = "DELETE FROM `member` WHERE `id` ='$id'";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/member.php');