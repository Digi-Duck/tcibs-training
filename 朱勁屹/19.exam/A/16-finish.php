<?php
    function build_array($v, $n, $factor) {
        if ($n % $factor == 0) {
            array_push($v, $n . " is a multiple of " . $factor . "**");
        } else {
            array_push($v, $n);
        }

        if ($n == 40) return $v;
        
        return build_array($v, $n + 1, $factor);
    }

    $v = build_array(array(), 1, $_GET['factor']);

    print_r($v);
?>