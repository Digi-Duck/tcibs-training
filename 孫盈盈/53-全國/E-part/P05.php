<?php
$stdin = fopen('php://stdin', 'r');

$input = fgets($stdin);
$cost = intval($input);

fclose($stdin);
$money = array(50, 10, 5, 1);

$ar = array();
$num = 0;
$total_num = 0;

while(1){
    if($cost >= $money[$num]){
        $total_num++;
        $cost = $cost - $money[$num];
    }else{
        $ar[] = $total_num;
        $total_num = 0;
        $num ++ ;
    }

    if($num === 4){
        break;
    }
}
$total = 0;
$length = count($ar);
for($i = $length - 1; $i >= 0; $i--){
    echo $money[$i]. ' '. $ar[$i]. "\n";
    $total += $ar[$i]; 
}
echo $total;
?>