<?php
$stdin = fopen('php://stdin', 'r');
$int = intval(fgets($stdin));
fclose($stdin);
$array = array(0,1);
for($i = 2; $i <= $int; $i++){
    $array[$i] = $array[$i - 2] + $array[$i - 1];
}
echo $array[$int];
?>