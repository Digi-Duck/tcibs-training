<?php
    echo '請輸入一個正整數n: ';
    $n = trim(fgets(STDIN));

    $fibs = array(0, 1);
    for ($i = 2; $i <= $n; $i++) {
        $fibs[$i] = $fibs[$i - 1] + $fibs[$i - 2];
    }
    echo $fibs[$n];
?>