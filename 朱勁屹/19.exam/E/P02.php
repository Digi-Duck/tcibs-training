<?php
    $line = fgets(STDIN);
    
    echo num($line);
    function num($num){
        if($num == 0){
            return 0;
        }elseif($num == 1){
            return 1;
        }else{
            return num($num - 1) + num($num - 2);
        }
    }