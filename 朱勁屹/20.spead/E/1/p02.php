<?php
    $n = readline();
    $array = array(0,1);

    for ($i=2; $i <= $n; $i++) { 
        $array[$i] = $array[$i-1] + $array[$i-2];
    }
    echo $array[$n];