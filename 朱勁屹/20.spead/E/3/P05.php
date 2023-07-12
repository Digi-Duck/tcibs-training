<?php  
    $line = readline();
    $num = [50,10,5,1];
    $ans = [];
    foreach ($num as $key => $value) {
        $a = floor($line/$value);
        array_push($ans,$a);
        $line = $line % $value;
    }
    for ($i=3; $i >= 0; $i--) { 
        echo $num[$i].' '.$ans[$i]."\n";
    }
