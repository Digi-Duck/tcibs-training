<?php
 $input = readline();
 $array = explode(' ', $input);
 $stoke = array();
 $answer = array();
 $object = array(
    '+' => 1, 
    '-' => 1,
    '*' => 2, 
    '/' => 2,  
    '(' => 0, 
);
foreach($array as $key => $value){
    if(is_numeric($value)){
        $answer[] = $value;
    }else if($value === '('){
        $stoke[] = $value;
    }else if($value === ')'){
        while(end($stoke) !== '('){
            $answer[] = array_pop($stoke);
        }
        if(end($stoke) === '('){
            array_pop($stoke);
        }
    }else{
        if(!empty($stoke) && $object[$value] < $object[$stoke[count($stoke) - 1]]){
            $answer[] = $value;
        }else{
            $stoke[] = $value;
        }
    }
}
$answerString = implode(' ', $answer).' '.implode(' ', array_reverse($stoke));
echo "$answerString\n";
$total = eval("return $input;");
echo $total;
?>