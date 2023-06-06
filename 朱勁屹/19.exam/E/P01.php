<?php
    function get()
    {
        $handle = fopen('php://stdin', 'r');
        $line = fgets($handle);
        fclose($handle);
        return $line;
    }
    $array = [];
    $b = [];
    $O = '';
    $X = '';
    $winO = 0;
    $winX = 0;
    $aa = 'O';
    $bb = 'X';
while(($num = readline()) != false){

    for ($i=0; $i < $num; $i++) { 
        $O = $O.$aa;
        $X = $X.$bb;
        array_push($array,$b);
        $ccc = str_split(get());
        // print_r($ccc);
        for ($a=0; $a < $num; $a++) { 
            array_push($array[$i],$ccc[$a]);
        }
    }
    for ($i=0; $i < $num; $i++) { 
        $four = $num - 1;
        $zzz = '';
        $yyy = '';
        $xxx = '';
        $www = '';
        for ($a=0; $a < $num; $a++) { 
            $zzz.$array[$i][$a];
            $yyy.$array[$a][$i];
            $xxx.$array[$a][$a];
            $www.$array[$a][$four];
            $four--;
        }
        if($zzz == $O || $yyy == $O || $xxx == $O || $www == $O){
            $winO = 1;
        }elseif($zzz == $X || $yyy == $X ||  $xxx == $X || $www == $X){
            $winX = 1;
        }
    }
    // print_r($array);
    if($winO == 1 && $winX == 0){
        echo 'O';

    }elseif($winO == 0 && $winX == 1){
        echo 'X';
    }else{
        echo '?';
    }
    echo $zzz;
    echo $yyy;
    echo $xxx;
    echo $www;

    break;
    
}
