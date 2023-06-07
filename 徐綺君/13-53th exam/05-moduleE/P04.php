<?php
    echo '請輸入向量的數量與向量的長度: ';
    $n = explode(' ', trim(fgets(STDIN)));

    echo '請輸入向量V0: ';
    $v0 = explode(' ', trim(fgets(STDIN)));

    echo '請輸入距離演算法(1or2): ';
    $type = explode(' ', trim(fgets(STDIN)));

    for ($i=0; $i < $n[0]; $i++) {
        $j = $i+1; 
        echo '請輸入向量V'.$j.': ';
        $arr[$i] = explode(' ', trim(fgets(STDIN)));
    }
  
    $allNum = [];
    foreach ($arr as $key => $value) {
        if ($type == 1) {
            array_push($allNum, f1($n[1], $v0, $value));
        }elseif ($type == 2) {
            array_push($allNum, count(array_diff($v0,$value)));
            echo 
        }
    }
    // print_r($allNum);

    function f1($n, $v0, $v){
        if ($n == 1) {
            return ($v0[0] - $v[0]) * ($v0[0] - $v[0]);
        }else{
            $n--;
            return sqrt(($v0[$n] - $v[$n])*($v0[$n] - $v[$n]) + f1($n,$v0,$v));
        }
    }


?>