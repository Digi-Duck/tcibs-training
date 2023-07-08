<?php
    $line = readline();
    $array = array(0,1);
    for ($i=2; $i <= $line ; $i++) { 
        $array[$i] = $array[$i - 1] + $array[$i - 2];
    }
    echo $array[$line];