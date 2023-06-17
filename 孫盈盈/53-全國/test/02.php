<?php
$number = fgets(STDIN);
$array = array();
for ($i=0; $i < $number; $i++) { 
    $input = fgets(STDIN);
    $array[] = $input;
}
echo max($array);