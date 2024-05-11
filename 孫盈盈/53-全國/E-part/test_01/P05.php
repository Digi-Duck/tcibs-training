<?php
$ar = [50, 10, 5, 1];
$input = intval(readline());
$array = array(0, 0, 0, 0);

$total = 0;
for ($i=0; $i < 4; $i++) { 
   if ($input % $ar[$i] >= 0) {
        $num = floor($input / $ar[$i]);
        $input = $input - ($num * $ar[$i]);
        $array[$i] = $num;
        $total += $num;
   }
}
for ($i=count($ar) - 1; $i >= 0; $i--) { 
    echo $ar[$i].' '.$array[$i]."\n";
}
echo $total;