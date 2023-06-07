<?php
    echo '請輸入一個正整數n: ';
    $n = trim(fgets(STDIN));

    echo f($n);

    function f($n){
        if ($n == 0) {
            return 0;
        }elseif($n == 1){
            return 1;
        }else{
            $x = $n - 1;
            $y = $n - 2;
            return f($x) + f($y); 
        }
    }
?>