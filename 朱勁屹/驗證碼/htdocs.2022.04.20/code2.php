<?php
@session_start();
header('Content-type: image/JPEG');
$num = $_GET['num'];
$char = $_SESSION['char'][$num];

// echo $num;
$width = 30;
$height = 30;

$img = imagecreate($width, $height);
$black = imagecolorallocate($img, 0, 0, 0);
$gray = imagecolorallocate($img, 200, 200, 200);

imagefill($img, 0, 0, $gray);
imagestring($img, 5, $width * 0.375, $height * 0.2, $char, $black);

imageJPEG($img);
imagedestroy($img);