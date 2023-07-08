<?php
    $word = explode(' ',readline());
    $num = readline();
    $array = [];
    $a = true;
    $in = str_split($word[0]);
    $end = str_split($word[1]);
    $an = [];

    for ($i=0; $i < $num; $i++) { 
        array_push($array,str_split(readline()));
    }
    while($a){
        $b = 0;
        foreach ($array as $key => $value) {
            if($in == $end){
                $a = false;
            }elseif(count(array_diff_assoc($value,$in)) == 1){
                array_push($an,$value);
                $in = $value;
                $b = 1;
            }
        }
        if($b == 0){
            if(count($array) > 0){
                unset($array[array_search(end($an),$array)]);
                unset($an[array_search(end($an),$an)]);
            }else{
                $a = false;
            }
    }
    }
    print_r($an);
