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

if($method === '1'){

}else if($method === '2'){
    $t = $input[0];
    $two_array = array();
    for ($i=0; $i < $t; $i++) { 
        $two = explode(' ', fgets(STDIN));
        $two_array[] = $two; 
    }
    $grade = array();
    for ($i=0; $i < count($two_array); $i++) { 
        $total = 0;
        foreach($two_array[$i] as $key =>$value){
            if($value == $array[$key]){
                $total++;
            }
        }
        $grade[] = $total;
    }
    $index = 0;
    for ($i=0; $i < count($grade); $i++) { 
        if($grade[$i] == max($grade)){
            $index = $i;
            break;
        }
    }
    echo implode(' ', $two_array[$index]);
}else{
    echo 'none';
}
?>