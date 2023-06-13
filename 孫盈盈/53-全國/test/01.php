<?php
$numbers = fgets(STDIN);
$numbers = explode(' ', trim($numbers));

$sum = 0;
foreach ($numbers as $number) {
  $sum += intval($number);
}

echo $sum;
?>