<?php
require('setup.php');


$id = $_POST['id'];
$sql = "DELETE FROM `to-do-work` WHERE `id`='$id'";
mysqli_query($connect, $sql);

header('Location:/htdocs.2022.04.20/user.php');