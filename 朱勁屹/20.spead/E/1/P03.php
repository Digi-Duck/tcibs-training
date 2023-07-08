<?php
    $n = readline();
    for ($i=0; $i < $n; $i++) { 
        $arr[$i] = readline();
    }
    foreach ($arr as $key => $value) {
        $arrNum = [];
        $arrNum = f($value,2,$arrNum);
        $arrNum = array_count_values($arrNum);
        $cou = 1;
        foreach ($arrNum as $key => $value) {
            if($value == 1){
                echo $key;
            }else{
                echo $key.'^'.$value;
            }
            if(count($arrNum) == $cou){
                
            }else{
                echo '*';
            }
            $cou++;
        }
    }
    function f($value,$y,$arrNum) {
        if($value == 1){
            return $arrNum;
        }elseif($value % $y == 0){
            $value = $value/$y;
            array_push($arrNum,$y);
            return f($value,$y,$arrNum);
        }else{
            $y++;
            return f($value,$y,$arrNum);
        }
    }