<?php
    $line = trim(fgets(STDIN));
    $stand = trim(fgets(STDIN));
    $type = trim(fgets(STDIN));

    $a = explode(' ',$line);
    $stand = explode(' ',$stand);

    $array = [];
    $stArr = [];
    for ($i=0; $i < $a[0]; $i++) { 
        $input = trim(fgets(STDIN));
        $input = explode(' ',$input);
        array_push($array,$input);
    }
    if($type == 1){
        foreach ($array as $key => $value) {
            $bbb = 0;
            foreach ($value as $k => $v) {
                $bbb = $bbb + ($stand[$k] - $v) * ($stand[$k] - $v);
            }
            array_push($stArr,sqrt($bbb));

        }
        for ($i=0; $i < $a[1]; $i++) { 
            echo $array[array_search(min($stArr),$stArr)][$i].' ';
        }
    }else{

        foreach ($array as $key => $value) {
            array_push($stArr,count(array_diff_assoc($stand,$value)));
        }
        for ($i=0; $i < $a[1]; $i++) { 
            echo $array[array_search(min($stArr),$stArr)][$i].' ';
        }
    }
    