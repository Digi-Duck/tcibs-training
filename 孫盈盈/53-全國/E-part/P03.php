<?php
$stdin = fopen('php://stdin', 'r');

$input = fgets($stdin);

$int = intval($input);

$num = 0;
$num_array = array();

while(1){
    $line = fgets($stdin);
    
    $int_line = intval($line);
    $num_array[$num] = $int_line;

    $num ++;
    if($num >= $int){
        fclose($stdin);
        break;
    }
}
function prime($num){

    $ar = array();
    $divisor = 2;

    while($num > 1){
        if($num % $divisor === 0){
            $ar[] = $divisor;
            $num /= $divisor;
        }else{
            $divisor++;
        }
    }
    return $ar;
}
function answer($num){
    $ar = prime($num);

    foreach($ar as $i => $value){
        if(empty($ar[$i+1])){
            echo $value. '';
        }else{
            echo $value . '*';
        }
    }
}
foreach($num_array as $element){
    answer($element);
    echo "\n";
}
?>