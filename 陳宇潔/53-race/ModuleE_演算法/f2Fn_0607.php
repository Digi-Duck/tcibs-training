<?php
    $n = intval(trim(fgets(STDIN)));
    function f($n) {
        if (!$n) {
            return 0;
        } elseif ($n == 1) {
            return 1;
        } else {
            return f($n - 1) + f($n - 2);
        }
    }
    echo f($n)."\n";
?>