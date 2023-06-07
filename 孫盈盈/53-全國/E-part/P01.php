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
        if(strlen($a) === 3){
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
for ($i=0; $i < $input; $i++) { 
    $x = [];
    $l = '';
    $y = '';
    for ($j=0; $j < $input; $j++) { 
        $x[] = $total[$j][$i];
        $y = $total[$j][$i];
        $l = $total[$j][$j];
    }
    // echo $l;
    // f($x);
    print_r($x);
}
function f($a){
    if($a[0] === 'O' && $a[1] === 'O' && $a[2] === 'O'){
        echo 'O';
    }else if($a[0] === 'X' && $a[1] === 'X' && $a[2] === 'X'){
        echo 'X';
    }else{
        echo '?';
    }
}
?>
