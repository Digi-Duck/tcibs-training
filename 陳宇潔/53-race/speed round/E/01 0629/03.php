<?php
    $lines = trim(readline());
    for ($i = 0; $i < $lines; $i ++) { 
        $line = intval(trim(readline()));
        $nums[] = $line;
    }
    foreach($nums as $num){
        $output = '';
        for($j = 2; $j <= $num; $j++){
            $count = 0;
            while($num % $j === 0){
                $count++;
                $num /= $j;
            }
            if($count > 0){
                $output .= ($count > 1) ? "{$j}^{$count}" : "{$j}";
                if($num > 1){
                    $output .= "*";
                }
            }
        }
        echo $output . " \n";
    }
?>