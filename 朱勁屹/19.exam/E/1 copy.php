<?php
    function get()
    {
        $handle = fopen('php://stdin', 'r');
        $line = fgets($handle);
        fclose($handle);
        return $line;
    }
while(($num = readline()) != false){
    $array = [];
    $b = [];
    $winO = 0;
    $winX = 0;

    for ($i=0; $i < $num; $i++) { 
    
        array_push($array,$b);
        $ccc = str_split(get());
        // print_r($ccc);
        for ($a=0; $a < $num; $a++) { 
            array_push($array[$i],$ccc[$a]);
        }
    }
    
    break;
    
}
