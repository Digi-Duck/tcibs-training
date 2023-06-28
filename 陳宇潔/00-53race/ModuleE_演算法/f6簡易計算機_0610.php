<?php
    $inputs = explode(" ", trim(readline()));
    $postfixs = ''; 
    $operators = []; 
    $prec = [
        "*" => 2,
        "/" => 2,
        "+" => 1,
        "-" => 1,
        "(" => 0
    ];
    foreach ($inputs as $i) {
        if ($i == '('){ 
            $operators[] = $i;
        }elseif ($i == ')') {
            while (end($operators) != '(') { // 當堆疊 $operators 的頂部元素為左括號 '(' 時，迴圈停止
                $postfixs .= array_pop($operators) . ' '; 
            }
            array_pop($operators); 
        }elseif (is_numeric($i)) {
            $postfixs .= $i . ' ';
        }else {
            while ($operators && $prec[$i] <= $prec[end($operators)]) { // 從Stack中刪除具有更高或相等優先級的運算符 並將它們附加在後綴表達式的末尾
                $postfixs .= array_pop($operators) . ' '; 
            }
            $operators[] = $i;
        }
    }
    while ($operators) { // 在後綴表達式末尾附加Stack中的任何剩餘運算符
        $postfixs .= array_pop($operators) . ' '; 
    }
    echo $postfixs . "\n";
    echo eval("return " . trim($input) . ";"); // 計算結果
?>
<!-- array_pop($operators); // 從陣列 $operators 中移除並返回最後一個元素 -->