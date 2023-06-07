<?php
    $line = fgets(STDIN);
    for ($i=0; $i < $line; $i++) { 
        $n = array();
        $array = [];
        $narray = [];
        $num = trim(fgets(STDIN));
        $n = a(2,$num,$n);
        $nnn = 0;
        $key = 0;
        ea($n,$key,$nnn,$num);
    }

    function ea($n,$key,$nnn,$num)
    {
        if($key < count($n)){
            $value = $n[$key];
            if($num % $value == 0){
                $time = 0;
                if($nnn == 0){
                    echo $value.'^'.aaa($num,$value,$time);
                    $nnn++;
                }else{
                    echo '*'.$value.'^'.aaa($num,$value,$time);
                }
            }
            ea($n,$key + 1,$nnn,$num);
        }
    }

    function a($a,$num,$n)
    {   
        if($a <= $num){
            $turn = b($a,2,$num,0);
            $fuck = $a + 1;
            $n = a($fuck,$num,$n);
            if($turn == 0){
                array_push($n,$a);
                // echo $a;
            }
        }
        return $n;
    }
    
    function b($a,$b,$num,$turn)
    {
        if($b < $num){
            if($a > $b){
                if($a%$b == 0){
                    $turn++;
                }
                $b++;
                $turn = $turn + b($a,$b,$num,$turn);
            }
            return $turn;

        }
    }

    function aaa($num,$value,$time)
    {
        $num = $num / $value;
        if($num % $value == 0){
            $time = aaa($num,$value,$time);
        }
        $time++;
        return $time;
    }