<?php
    $numLines = trim(readline());// 讀取要輸入幾行
    for ($i = 0; $i < $numLines; $i++) {
        $line = intval(trim(readline())); //一行一行讀取
        $nums[] = $line; //放進陣列
    }
    foreach ($nums as $num) {
        $output = '';//輸出
        for($j = 2; $j <= $num; $j++){
            $count = 0; //設定質因數出現過的次數
            while ($num % $j === 0) {
                $count++; //質因數出現就加一
                $num /= $j; //如果num還不是質數就繼續除
            }
            if ($count > 0) { //如果有質數
                $output .= ($count > 1) ? "{$j}^{$count}" : "{$j}";//如果同一個質因數大於一個 就執行該質因數^出現次數 如果沒有 就執行該質因數
                if ($num > 1) {
                    $output .= '*';
                }
                //如果質因數還沒除完就加*
            }
        }
        echo $output . "\n";
    }
?>