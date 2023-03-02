<?php
@session_start();
require('setup.php');
$id = $_SESSION['id'];
$goodsName = $_POST['goodsName'];
$goodsIntro = $_POST['goodsIntro'];
$goodsDate = date('Y-m-d H:i:s');
$goodsLink = $_POST['goodsLink'];
$goodsCost = $_POST['goodsCost'];
$goodsImg = $_POST['goodsImg'];

$card = $_POST['card'];

$sql = "INSERT INTO `goods`(`goods-name`, `goods-intro`, `goods-link`, `goods-date`, `goods-cost`, `goods-img`, `user-id`, `style`) VALUES ('$goodsName','$goodsIntro','$goodsLink','$goodsDate','$goodsCost','$goodsImg','$id','$card')";
$query = mysqli_query($connect, $sql);

header('Location:member-use.php');
?>