<?php
    $n = intval(trim(readline()));
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

    
    function Newf($n) {
        if ($n == 0 || $n == 1) {
            return $n;
        } else {
            return Newf($n - 1) + Newf($n - 2);
        }
    }
?>