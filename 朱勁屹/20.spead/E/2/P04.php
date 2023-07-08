<?php
    $line = explode(' ',readline());
    $b = explode(' ',readline());
    $type = readline();
    $array = [];
    $a = [];
    for ($i=0; $i < $line[0]; $i++) { 
        $array[$i] = explode(' ',readline());
    }

    foreach ($array as $key => $value) {
        if($type == 1){
            array_push($a,f($value,$line[1],$b));
        }elseif($type == 2){
            array_push($a,count(array_diff_assoc($value,$b)));
        }
        
    }

    // print_r(min($a));
    foreach ($array[array_search(min($a),$a)] as $key => $value) {
        echo $value.' ';
    }
    function f($array,$a,$b) {
        if($a == 1){
            return ($b[0] - $array[0]) * ($b[0] - $array[0]);
        }else{
            $a--;
            return ($b[$a] - $array[$a]) * ($b[$a] - $array[$a]) + f($array,$a,$b);
        }
    }