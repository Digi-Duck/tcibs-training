<?php
$input = intval(readline());
$i = 0;
$answer = array();
function f($input, $i, $answer){
    if($i > $input){
        echo $answer[$input];
    }else{
        if($i == 0 || $i == 1){
            $answer[] = $i;
            $i++;
            f($input, $i, $answer);
        }else{
            $answer[$i] = $answer[$i - 1] + $answer[$i - 2];
            $i++;
            f($input, $i, $answer);
        }
    }
}
f($input, $i, $answer);