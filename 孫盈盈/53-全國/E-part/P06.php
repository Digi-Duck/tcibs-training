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
);

foreach($array as $key => $value){
    if(is_numeric($value)){
        $answer[] = $value;
    }else if($value === '('){
        $stoke[] = $value;
    }else if($value === ')'){
        while($op = array_pop($stoke) !== '('){
            $answer[] = $op;
        }
    }else{
        if(!empty($stoke) && $object[$value] < $object[$stoke[count($stoke) - 1]]){
            echo $value;
            $answer[] = $value;
        }else{
            $stoke[] = $value;
        }
    }
}
print_r($stoke);
$total = eval("return $input;");
?>