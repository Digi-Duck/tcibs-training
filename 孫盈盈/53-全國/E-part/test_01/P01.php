<?php
$input = intval(readline());
$array = array();
$s = '';
for ($i=0; $i < $input; $i++) { 
    $int = array();
    $string = readline(); 
    for ($j=0; $j < strlen($string); $j++) { 
        $int[] = $string[$j];
    }
    $array[] = $int;
}
$s = '';
$l = [];
$r = [];
for ($i=0; $i < $input; $i++) { 
    $x = [];
    $y = [];
    for ($j=0; $j < $input; $j++) { 
        $x[] = $array[$i][$j];
        $y[] = $array[$j][$i];
    }
    $l[] = $array[$i][$i];
    $r[] = $array[$i][$input - $i - 1];
    $s = f($x).f($y);
}
$s .= f($l).f($r);
$e = '';
for ($i=0; $i < strlen($s); $i++) { 
    if($s[$i] == 'O'){
        $e = 'O';
        break;
    }else if($s[$i] == 'X'){
        $e = 'X';
        break;
    }else{
        $e = '?';
    }
}
echo $e;
function f($a){
    $true = true;
    foreach($a as $value){
        if($value != $a[0]){
            $true = false;
        }
    }
    if($true){
        return $a[0];
    }else{
        return '?';
    }
}