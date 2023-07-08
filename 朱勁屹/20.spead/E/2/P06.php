<?php
    $n = explode(" ",readline());
    $out = '';
    $op = [];
    $turn = false;

    foreach ($n as $key => $value) {
        if(is_numeric($value)){ 
            $out = $out.$value.' ';
        }elseif($value == '('){
            $turn = true;
        }elseif($turn && $value == ')'){
            $out = $out.end($op).' ';
            $turn = false;
        }else{
            if(!$turn && f(end($op)) > f($value)){
                $out = $out.end($op).' ';
                array_pop($op);
            }
            array_push($op,$value);

        }
    }
    for ($i=count($op) - 1; $i >= 0 ; $i--) { 
        $out = $out.$op[$i].' ';
    }
    
    echo $out."\n\n";
    $out = explode(' ',$out);
    $num = [];
    foreach ($out as $key => $value) {
        if(is_numeric($value)){
            array_push($num,$value);

        }else{
            $f2 = end($num);
            $f1 = prev($num);

            switch ($value) {
                case '*':
                    $x = $f1*$f2;
                    break;

                case '/':
                    $x = $f1/$f2;
                    break;

                case '-':
                    $x = $f1-$f2;
                    break;

                case '+':
                    $x = $f1+$f2;
                    break;
                    
                default:
                    break;
            }
            array_pop($num);
            array_pop($num);
            array_push($num,$x);
        }
                
    }

    print_r(end($num));
    function f($op) {
        switch ($op) {
            case '*':
                return 4;
                break;
            case '/':
                return 3;
                break;
            case '-':
                return 2;
                break;
            case '+':   
                return 1;
                break;
            default:
                # code...
                break;
        }
    }