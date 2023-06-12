<?php
$input = trim(fgets(STDIN));

$answer = trim(fgets(STDIN));
$array = explode(' ', $answer);
if(count($array) != $input[2]){
    echo count($array), $input[2];
    echo '數不對';
    exit;
}
$method = trim(fgets(STDIN));

$t = $input[0];
$two_array = array();
$grade = array();
$index = 0;
for ($i=0; $i < $t; $i++) { 
    $two = explode(' ', fgets(STDIN));
    $two_array[] = $two; 
}

if($method === '1'){
    foreach($two_array as $key =>$value){
        $total = 0;
        for ($i=0; $i < count($array); $i++) { 
            $total += sqrt(pow(intval($array[$i]) - intval($value[$i]), 2));
        }
        $grade[] = intval($total);
    }
}else if($method === '2'){
    for ($i=0; $i < count($two_array); $i++) { 
        $total = 0;
        foreach($two_array[$i] as $key =>$value){
            if($value != $array[$key]){
                $total++;
            }
        }
        $grade[] = $total;
    }
}else{
    echo 'none';
}
for ($i=0; $i < count($grade); $i++) { 
    if($grade[$i] == min($grade)){
        $index = $i;
        break;
    }
}
echo implode(' ', $two_array[$index]);
?>