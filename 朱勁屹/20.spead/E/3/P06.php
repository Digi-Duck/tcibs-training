<?php
    $line = explode(' ',readline());
    $turn = false;
    $out = '';
    $op = [];
    foreach ($line as $key => $value) {
        if(is_numeric($value)){
            $out = $out.' '.$value.' ';
        }elseif($value == '('){
            $turn = true;
        }elseif($turn && $value == ')'){
            $out = $out.end($op).' ';
            array_pop($op);
            $turn = false;
        }else{
            if(!$turn && f(end($op)) > f($value)){
                $out = $out.end($op).' ';
                array_pop($op);
            }
            array_push($op,$value);
        }
    }
    foreach ($op as $key => $value) {
        $out = $out.$value.' ';
    }
    echo $out;
    function f($op) {
        switch ($op) {
            case '*':
                return 4;
                break;
            case '/':
                return 3;
                break;
            case '+':
                return 2;
                break;
            case '*-':
                return 1;
                break;
        
            default:
                # code...
                break;
        }
    }