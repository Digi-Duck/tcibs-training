<?php
    $line = readline();
    $X = '';
    $O = '';
    $winX =0;
    $winO =0;
    $array = [];
    for ($i=0; $i < $line; $i++) { 
        $X = $X.'X';
        $O = $O.'O';
        array_push($array,str_split(readline()));
    }
    foreach ($array as $key => $value) {
        $zzz = '';
        $yyy = '';
        $xxx = '';
        $www = '';

        $c = $line - 1;
        foreach ($value as $k => $v) {
            $zzz = $zzz.$v;
            $yyy = $yyy.$array[$k][$key];
            $xxx = $xxx.$array[$k][$k];
            $www = $www.$array[$k][$c];
            $c--;
        }
        if($zzz == $O ||$xxx == $O ||$yyy == $O ||$www == $O ){
            $winO = 1;
        }elseif($zzz == $X ||$xxx == $X ||$yyy == $X ||$www == $X){
            $winX = 1;
        }

    }
    if($winO == 1 && $winX == 1){
        echo '?';
    }elseif($winO == 1){
        echo "O";
    }elseif($winX == 1){
        echo 'X';
    }else{
        echo "?";
    }