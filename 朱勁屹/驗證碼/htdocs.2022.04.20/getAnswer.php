<?php
@session_start();

$text = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRETUVWSYZ1234568790";
$char = '';
$word = '';
for($i = 0;$i < 4;$i++){
    $word .= $text[rand(0 , strlen($text) - 1)];
    $text = str_replace($word, "", $text); 
}
$char = $word;
$_SESSION['char'] = $char;
echo $char;

