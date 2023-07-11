<?php
    $lines = trim(readline());
    for ($i = 0; $i < $lines; $i++) { 
        $line = trim(readline());
        $all[] = str_split($line);
    }
    function checkLine($line, $OX){
        return !in_array(false, array_map(function ($char) use ($OX) {return $char == $OX;}, $line));
    }
    $isO = false;
    $isX = false;
    for($i = 0; $i < $lines; $i++){
        if(checkLine($all[$i], 'O')) {
            $isO = true;
        }
        if(checkLine($all[$i], 'X')){
            $isX = true;
        }
    }
    for($i = 0; $i < $lines; $i++){
        for($j = 0; $j < $lines; $j++){
            $column[] = $all[$j][$i];
        }
        if(checkLine($column, 'O')) {
            $isO = true;
        }
        if(checkLine($column, 'X')){
            $isX = true;
        }
    }
    for($i = 0; $i < $lines; $i++){
        $slash1[] = $all[$i][$i];
        $slash2[] = $all[$i][$lines - 1 - $i]; 
    }
    if(checkLine($slash1, 'O') || checkLine($slash2, 'O')) {
        $isO = true;
    }
    if(checkLine($slash1, 'X') || checkLine($slash2, 'X')){
        $isX = true;
    }
    if($isO && $isX){
        echo '?';
    }elseif($isO){
        echo 'O';
    }elseif($isX){
        echo '?';
    }
?>