<?php
    session_start();
    header("Content-type: image/PNG");

    imgcode(1,20,20);
    function imgCode($nun, $w, $h){
        $str = "23456789ABCDEFGHIJKLMOPQRSTUBWXYZabcdefghijkmnpqrstuvwxyz";
        $code = $str[mt_rand(0, strlen($str) - 1)];
        $_SESSION['verify1'] = $code;

        $img = imagecreate($w, $h);

        $dot = imagecolorallocate($img, mt_rand(0, 150), mt_rand(0, 150), mt_rand(0, 150));
        $background = imagecolorallocate($img, mt_rand(200, 256), mt_rand(200, 200), mt_rand(200, 200));

        imagefilledrectangle($img, 0, 0, $w, $h, $background);
        for($i = 0; $i <= 30; $i++){
            imagesetpixel($img, mt_rand(0, $w), mt_rand(0, $h), $dot);
        }
        imagestring($img, 5, mt_rand(2,10), mt_rand(1,4), $code, $dot);
        imagepng($img);
        imagedestroy($img);
        }
?>