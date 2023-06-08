<?php
    echo '輸入: ';
    $n = explode(' ', trim(fgets(STDIN)));
    $formula = '';
    $operator = '';

    foreach ($n as $key => $value) {
        if (is_numeric($value)) {
            echo $value."\n";
        }else{
            
        }
    }

    print_r($n);
?>