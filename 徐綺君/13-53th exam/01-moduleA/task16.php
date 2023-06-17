<?php
    $num = 0;
    $arr = array();

    function num($x,$num,$arr) {
        $num++;
        if ($num <= 40) {
            if ($num % $x == 0) {
                array_push($arr, $num . ' is a multiple of '.$x.'**');
            }else{
                array_push($arr, $num);
            }
            num($x,$num,$arr);
        }else{
            // print_r($arr);
            // echo '<pre>', print_r($arr), '</pre>';
            print_r("<pre>");
            print_r($arr);
            print_r("</pre>");
        }
    }
    $x = $_GET["factor"];

    num($x,$num,$arr);
