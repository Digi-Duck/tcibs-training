<?php
    $a = explode(' ',readline());
    $b = explode(' ',readline());
    $type = readline();

    for ($i=0; $i < $a[0]; $i++) { 
        $arr[$i] = explode(' ',readline());
    }
    $allNum = [];
    if($type == 1){
        foreach ($arr as $key => $value) {
            array_push($allNum,f($value,$b,$a[1]));
        }
    }elseif($type == 2){
        foreach ($arr as $key => $value) {
            array_push($allNum,count(array_diff_assoc($value,$b)));
            
        }
    }
        foreach ($arr[array_search(min($allNum),$allNum)] as $key => $value) {
            echo $value.' ';
        }
    function f($value,$b,$a) {
        if($a == 1){
            return ($value[0] - $b[0]) * ($value[0] - $b[0]);
        }else{
            $a--;
            return ($value[$a] - $b[$a]) * ($value[$a] - $b[$a]) + f($value,$b,$a);
        }
    }