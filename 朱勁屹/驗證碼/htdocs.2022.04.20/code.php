<?php
@session_start();

$text = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

$char = '';

for($i = 0;$i < 4;$i++){
    $char .= $text[rand(0 ,strlen($text)-1)];
}

$_SESSION['code'] = $char;

$img = imagecreate(60, 30);
$black = imagecolorallocate($img, 0, 0, 0);
$gray = imagecolorallocate($img, 200, 200, 200);

imagefill($img, 0, 0, $gray);

imagestring($img,5,5,5,$char,$black);

imageJPEG($img);
imagedestroy($img);