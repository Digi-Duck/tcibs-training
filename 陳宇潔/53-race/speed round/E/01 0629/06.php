<?php
    $inputs = explode(" ", trim(readline()));
    $postfixs = '';
    $operators = [];
    $prec = [
        "*" => 2,
        "/" => 2,
        "+" => 1,
        "-" => 1,
        "(" => 0
    ];
    foreach($inputs as $i){
        if($i == '('){
            $operators[] = $i;
        }else if($i == ')'){
            while(end($operators) != '('){
                $postfixs .= array_pop($operators) . ' ';
            }
            array_pop($operators);
        }else if(is_numeric($i)){
            $postfixs .= $i . ' ';
        }else{
            while($operators && $prec[$i] <= $prec[end($operators)]){
                $postfixs .= array_pop($operators) . ' ';
            }
            $operators[] = $i;
        }
    }
    while ($operators){
        $postfixs .= array_pop($operators) . ' ';
    }
    echo $postfixs . "\n";
    echo eval("return " . trim(implode(" ", $inputs)) . ";");

?>