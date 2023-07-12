<?php
    $line = explode(' ',readline());
    $b = explode(' ',readline());
    $type = readline();
    $count = $line[0];
    $long = $line[1];
    $a = 0;
    $array = [];
    $ans = [];
    for ($i=0; $i < $count; $i++) { 
        array_push($array,explode(' ',readline()));
    }
    foreach ($array as $key => $value) {
        if($type == 1){
            $a = f($value,$long,$b);
            array_push($ans,$a);
        }elseif($type == 2){
            $a = count(array_diff_assoc($value,$b));
            array_push($ans,$a);
        }
       
    }
    print_r($array[array_search(min($ans),$ans)]);
    foreach ($array[array_search(min($ans),$ans)] as $key => $value) {
        echo $value.' ';
    }
    function f($value,$long,$b) {
        if($long == 1){
            return ($value[0] - $b[0]) * ($value[0] - $b[0]);
        }else{
            $long--;
            return ($value[$long] - $b[$long]) * ($value[$long] - $b[$long]) + f($value,$long,$b);
        }
    }