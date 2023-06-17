<?php
    $n = trim(fgets(STDIN));
    for ($i=0; $i < $n; $i++) { 
        $arr[$i] = trim(fgets(STDIN));
    }

    foreach ($arr as $key => $value) {
        $allNum = [];
        $allNum = f($value,2,$allNum);
        $allNum = array_count_values($allNum);
    
        if (count($allNum) == 1) {
            echo "Y\n";
        }else{
            echo "N\n";
        }
    }

    function f($x,$y,$allNum){
        if ($x == 1) {
            return $allNum;
        }else{
            if ($x % $y == 0) {
                $x = $x/$y;
                array_push($allNum,$y);
                return f($x,$y,$allNum);
            }else{
                $y = $y + 1;
                return f($x,$y,$allNum);
            }
        }
    }
?>