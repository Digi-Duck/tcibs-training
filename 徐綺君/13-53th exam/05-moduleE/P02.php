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
            return f($n-1) + f($n-2); 
        }
    }
?>