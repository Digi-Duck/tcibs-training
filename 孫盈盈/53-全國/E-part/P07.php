<?php
$input = explode(' ', fgets(STDIN));
$length = fgets(STDIN);

$array = array();

$num = 0;
for($i = 0;$i<$length;$i++){
    $process = fgets(STDIN);
    $array[] = $process;
}
$answer = 0;
for ($i=0; $i < count($array); $i++) { 
    if($array[$i] == $input[1]){
        $answer = $i+1;
        break;
    }else{
        $answer = 0;
    }
}
echo $answer;
?>