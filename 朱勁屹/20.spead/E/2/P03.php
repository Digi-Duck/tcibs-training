<?php
    $line = readline();
    $array = [];
    for ($i=0; $i < $line; $i++) { 
        array_push($array,readline());
    }
    foreach ($array as $key => $value) {
        $arr = [];
        $arr = f($value,$arr,2);
        $arr = array_count_values($arr);
        $nn = 1;
        foreach ($arr as $key => $value) {
            if($value == 1){
                echo $key;
            }else{
                echo $key.'^'.$value;
            }
            if($nn == count($arr)){
                echo "\n";
            }else{
                echo "*";
            }
            $nn++;
        }
    }
    function f($value,$arr,$y) {
        if($value == 1){
            return $arr;
        }elseif($value % $y == 0 ){
            $value = $value/$y;
            array_push($arr,$y);
            return f($value,$arr,$y);
        }else{
            $y++;
            return f($value,$arr,$y);
        }

        
    }