<?php
    $line = trim(fgets(STDIN));
    
    $f = array(0,1);
    for ($i = 2; $i <= $line; $i++) { 
        $f[$i] = $f[$i - 1] + $f[$i - 2];
    }
    echo $f[$line];