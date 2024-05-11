<?php
$count = readline();
$conllect = array();
for ($i=0; $i < $count; $i++) { 
    $input = readline();
    $conllect[] = $input;
}
function prime($num){
    $array = array();
    $d = 2;
    while($num > 1){
        if($num % $d === 0){
            $array[] = $d;
            $num /= $d;
        }else{
            $d ++;
        }
    }
    return $array;
}
function answer($num){
    $num_array = prime($num);
    $t = 1;
    foreach($num_array as $i => $value){
        if(empty($num_array[$i+1])){
            if($t == 1){
                echo $value.'';
            }else{
                echo $value.'^'.$t.'';
                $t = 1;
            }
        }else{
            if($num_array[$i+1] == $value){
                $t++;
            }else{
                if($t == 1){
                    echo $value.'*';
                }else{
                    echo $value.'^'.$t.'*';
                    $t = 1;
                }
            }
        }
    }

}
foreach($conllect as $con){
    answer($con);
    echo "\n";
}
