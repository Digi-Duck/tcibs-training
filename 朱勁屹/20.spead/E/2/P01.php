<?php
    $line = readline();
    $a = [];
    $x = '';
    $o = '';
    $winX = 0;
    $winO= 0;

    for ($i=0; $i < $line; $i++) { 
        array_push($a,str_split(readline()));
        $x = $x.'X';
        $o = $o.'O';
    }
    foreach ($a as $key => $value) {
        $zzz = '';
        $yyy = '';
        $xxx = '';
        $www = '';

        $num = $line - 1;
        foreach ($value as $k => $v) {
            $zzz = $zzz.$v;
            $yyy = $yyy.$a[$k][$key];
            $xxx = $xxx.$a[$k][$k];
            $www = $www.$a[$k][$num];
            $num--;
            
        }
        
        if($zzz == $x || $yyy == $x || $www == $x || $xxx == $x){
            $winX = 1;
        }
        if($zzz == $o || $yyy == $o || $www == $o || $xxx == $o){
            $winO = 1;
        }
        // echo $zzz;
        // echo $yyy;
        // echo $xxx;
        // echo $www;
    }
    // print_r($a);
    
    if($winO == 1 && $winX == 1){
        echo "?";
    }elseif($winO == 1){
        echo "O";
    }elseif($winX == 1){
        echo "X";
    }else{
        echo '?';
    }