<?php
    $line = readline();
    $X = '';
    $O = '';
    $a = [];
    $winX = 0;
    $winO = 0;

    for ($i=0; $i < $line; $i++) { 
        $num = readline();
        $X = $X.'X';
        $O = $O.'O';
        $b = str_split($num);
        array_push($a,$b);
    }

    foreach ($a as $key => $value) {
        $c = $line - 1;
        $zzz = '';
        $yyy = '';
        $xxx = '';
        $www = '';
        foreach ($b as $k => $v) {
            $zzz = $zzz.$a[$key][$k];
            $yyy = $yyy.$a[$k][$key];
            $xxx = $xxx.$a[$k][$k];
            $www = $www.$a[$k][$c];
            $c--;

        }
        if($zzz == $O || $xxx == $O || $yyy == $O || $www == $O){
            $winO = 1;
        }else if($zzz == $X || $xxx == $X || $yyy == $X || $www == $X){
            $winX = 1;
        }
        
    }
    if($winO == 1 && $winX == 1){
        echo '?';
    }else if($winO == 0 && $winX == 0){
        echo '?';
    }else if($winO == 1){
        echo 'O';
    }else if($winX == 1){
        echo 'X';
    }

    