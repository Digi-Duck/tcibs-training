<?php
$number = fgets(STDIN);
$array = array();
for ($i=0; $i < $number; $i++) { 
    $input = fgets(STDIN);
    $array[] = $input;
}
function prime($num){
    if($num < 2){
        return false;
    }
    for ($i=2; $i <= sqrt($num); $i++) { 
        if($num % $i == 0){
            return false;
        }
    }
    return true;
}
for ($i=0; $i < count($array); $i++) { 
    if(prime($array[$i])){
        echo "Y\n";
    }else{
        echo "N\n";
    }
}
?>