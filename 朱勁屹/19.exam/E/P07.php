<?php
    $word = explode(' ',trim(fgets(STDIN)));
    $num = trim(fgets(STDIN));
    $array = [];
    $lon = 0;
    $a = 0;
    $in = str_split($word[0]);
    $end = str_split($word[1]); 
    $anArr = [];
    array_push($anArr,$in);

    for ($i=0; $i < $num ; $i++) { 
        array_push($array,str_split(trim(fgets(STDIN))));
    }
    while($a == 0){
        $b = 0;
        foreach ($array as $key => $value) {
            if($in == $end){
                $a = 1;
            }elseif (count(array_diff_assoc($in,$value)) == 1) {
                array_push($anArr,$value);
                $in = $value;
                $b = 1;
            }
            
        }
        // echo count(array_diff_assoc($start,$value));
        
        if($b == 0){
            // print_r($anArr);
            if(count($array) > 1){
                unset($array[array_search(end($anArr),$array)]);
                unset($anArr[array_search(end($anArr),$anArr)]);

            }else{
                $array = [];
            }

        }
    }

    // foreach ($anArr as $key => $value) {
    //     foreach ($value as $k => $v) {
    //         echo $v;
    //     }
    //     echo ''."\n";
    // }
    echo count($anArr);