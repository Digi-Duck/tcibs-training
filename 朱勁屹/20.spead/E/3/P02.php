<?php
    $line = readline();
    $a = array(0,1);
    for ($i=2; $i <= $line; $i++) { 
        $a[$i] = $a[$i - 1] + $a[$i - 2];
    }
    echo $a[$line];