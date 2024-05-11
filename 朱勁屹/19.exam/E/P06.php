<?php
    $n = explode(' ',trim(fgets(STDIN)));
    $out = [];
    $basket = [];
    $font = [];
    $back = [];
    $basketTurn = false;

    
    foreach ($n as $key => $value) {
        if(is_numeric($value) && !$basketTurn){
            array_push($font,$n);
        }
    }