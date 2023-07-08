<?php
    $n = readline();
    $arr = [];
    $num = [50,10,5,1];

    foreach ($num as $key => $value) {
        array_push($arr,floor($n/$value));
        $n = $n % $value;
    }
    for ($i=3; $i >=0 ; $i--) { 
        echo $num[$i].' '.$arr[$i]."\n";
    }