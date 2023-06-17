<?php
 $get = $_GET['f'];

 $number = 0;
 $array = array();
 function f($num, $number, $array){
    if($number < 40){
        $array[] = $number + 1;
        if($array[$number] % $num == 0){
            $array[$number] .= ' is a multiple of '.$num.'**';
        }
        $number++;
        f($num, $number, $array);
    }else{
        print_r('<pre>');
        print_r($array);
        print_r('</pre>');
    }
 }
 f($get, $number, $array);
 ?>