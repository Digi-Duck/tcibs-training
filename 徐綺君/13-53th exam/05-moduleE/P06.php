<?php
    $n = explode(' ', trim(fgets(STDIN)));
    $formula = '';
    $out = '';
    $op = [];
    $num = [];
    $brackets = false;

    foreach ($n as $key => $value) {
        if (is_numeric($value)) {
            $out = $out.$value.' ';
        }elseif($value == '('){
            $brackets = true;
        }elseif($brackets && $value == ')'){
            $out = $out.end($op).' ';
            array_pop($op);
            $brackets = false;
        }else{
            if ($op && !$brackets && f(end($op)) > f($value)) {
                $out = $out.end($op).' ';
                array_pop($op);
            }
            array_push($op,$value);
        }
    }
    for ($i = count($op)-1; $i >= 0; $i--) { 
        $out = $out.$op[$i].' ';
    }
    echo $out."\n";

    function f($x){
        switch ($x) {
            case '*':
                return 4;
                break;
            case '/':
                return 3;
                break;
            case '+':
                return 2;
                break;
            case '-':
                return 1;
                break;                  
            default:
                break;
        }
    }

    $out = explode(' ', $out);
    foreach ($out as $key => $value) {
        if(is_numeric($value)){
            array_push($num,$value);
        }else{
            $n2 = end($num);
            $n1 = prev($num);
            switch ($value) {
                case '*':
                    $x = $n1*$n2;
                    break;
                case '/':
                    $x = $n1/$n2;
                    break;
                case '+':
                    $x = $n1+$n2;
                    break;
                case '-':
                    $x = $n1-$n2;
                    break;                  
                default:
                    break;
            }
            array_pop($num);
            array_pop($num);
            array_push($num,$x);
        }
    }
    echo $num[0];
?>