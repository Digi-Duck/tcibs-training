<?php  
    $num = readline();
    $a = [50,10,5,1];
    $b = [];
    for ($i=0; $i < 4; $i++) { 
        $b[$i] = floor($num / $a[$i]);
        $num = $num % $a[$i];
    }
    for ($i=3; $i >= 0; $i--) { 
        echo $a[$i]." ".$b[$i]."\n";
    }