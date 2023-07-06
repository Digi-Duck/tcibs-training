<?php
    while(($line = readline()) !== false) {
        $numbers = explode(' ', $line);
        $num1 = $numbers[0];
        
        if($num1 === '-1')
        break;
        
        $num2 = $numbers[1];
        echo $num1 + $num2;
        echo "\n";
    }
?>