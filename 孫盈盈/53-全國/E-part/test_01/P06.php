<?php
$input = readline();
$ar = explode(' ', $input);
$stoke = array();
$answer = array();

$object = ([
    '+'=>1,
    '-'=>1,
    '*'=>2,
    '/'=>3,
    '('=>4
]);

foreach($ar as $key => $value){
    if(is_numeric($value)){
        $answer[] = $value;
    }else if($value == '('){
        $stoke[] = $value;
    }else if($value == ')'){
        while(end($stoke) !== '('){
            $answer[] = array_pop($stoke);
        }
        if(end($stoke) == '('){
            array_pop($stoke);
        }
    }else{
        if(!empty($stoke) && !empty($object[count($stoke) - 1]) && $object[$value] < $object[count($stoke) - 1]){
            $answer[] = $value;
        }else{
            $stoke[] = $value;
        }
    }
}
echo implode(' ', $answer).' '.implode(' ', array_reverse($stoke))."\n";
$total = eval("return $input;");
echo $total;