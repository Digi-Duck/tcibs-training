<?php
    $line = readline();
    $x = '';
    $o = '';
    $a = [];
    $winO = 0;
    $winX = 0;
     for ($i=0; $i < $line; $i++) { 
        $aaa = str_split(readline());
        $x = $x.'x';
        $o = $o.'o';
        array_push($a,$aaa);
     }
     foreach ($a as $key => $value) {
        $c = $line - 1;
        $zzz = '';
        $yyy = '';
        $xxx = '';
        $www = '';
        foreach ($value as $k => $v) {
            $zzz = $zzz.$v;
            $yyy = $yyy.$a[$k][$key];
            $xxx = $xxx.$a[$k][$k];
            $www = $www.$a[$k][$c];
            $c--;
        }
        if($zzz == $x || $yyy == $x || $xxx == $x || $www == $x ){
            $winX = 1;
        }elseif($zzz == $o || $yyy == $o || $xxx == $o || $www == $o){
            $winO = 1;
        }
     }
     if($winO == 1 && $winX == 1){
        echo '?';
     }elseif($winO == 1){
        echo 'O';
     }elseif($winX == 1){
        echo 'X';
     }else{
        echo '?';
     }