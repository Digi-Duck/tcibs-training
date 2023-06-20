<?php
$stdin = fopen('php://stdin', 'r');

$input = intval(fgets($stdin));

$total = array();
$count = $input;

while(1){
    $int = array();
    $a = trim(fgets($stdin));
    // $length = count($a);

    for ($i=$input - 1; $i >= 0; $i--) { 
        if(strlen($a) === $input){
            $int[] = $a[$i];
        }else{
            echo '少了';
            echo strlen($a);
            break;
        }
    }
    $total[] = $int;
    $count --;
    if($count === 0){
        break;
    }
}

$s = '';
for ($i=0; $i < $input; $i++) { 
    $x = [];
    $y = [];
    $l = [];
    $r = [];

    for ($j=0; $j < $input; $j++) { 
        $f = $input - $j - 1;
        $x[] = $total[$j][$i];
        $y[] = $total[$i][$j];
        $l[] = $total[$j][$j];
        $r[] = $total[$f][$j];
    }
    $s .= f($x) . f($y) . f($l) . f($r);
    // echo $s;
}

$e = '';
for($i=0;$i<strlen(trim($s));$i++){
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
    foreach($a as $key){
        if($key !== $a[0]){
            $true = false;
            break;
        }
    }

    if($true){
        return $a[0];
    }else{
        return '?';
    }
}
?>
