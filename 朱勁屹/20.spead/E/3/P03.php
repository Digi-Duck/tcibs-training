<?php
    $line = readline();

    for ($i=0; $i < $line; $i++) { 
        $num = readline();
        $ans = [];
        $ans = f($ans,$num,2);
        $ans = array_count_values($ans);
        $end = 1;
        foreach ($ans as $key => $value) {
            if($value > 1){
                echo $key.'^'.$value;
            }else{
                echo $key;
            }
            if($end != count($ans)){
                echo "*";
            }else{
                echo "\n";
            }
            $end++;
        }
    }
    
    function f($ans,$num,$y){
        if($num == 1){
            return $ans;
        }elseif($num % $y == 0){
            array_push($ans,$y);
            $num = $num/$y;
            return f($ans,$num,$y);
        }else{
            $y++;
            return f($ans,$num,$y);
        }
    }