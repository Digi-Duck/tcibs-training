<?php
    $factor = $_GET['factor'];
    $array = [];
    function show($factor, $num, $array){
        if($num <= 40){
            $isMultiple = !($num % $factor) ? " is a multiple of ".$factor."**" : "";
            array_push($array, $num.$isMultiple);
            return show($factor, $num + 1, $array);
        }
        return $array;
    }
    $result = show($factor, 1, $array);
    echo "<pre>";
    echo "Modified ";
    print_r($result);
    echo "</pre>";
?>


