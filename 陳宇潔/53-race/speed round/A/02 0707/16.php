<?php
    $factor = $_GET['factor'];
    $array = [];
    function show($num) {
        global $factor, $array;
        if($num <= 40){
            $isMutiple = !($num % $factor) ? " is a multiple of $factor **" : "";
            array_push($array, $num.$isMutiple);
            return show($num +1);
        }
        return $array;
    }
    $result = show(1);
    echo "<pre>Modified ";
    print_r($result);
    echo "</pre>";
?>