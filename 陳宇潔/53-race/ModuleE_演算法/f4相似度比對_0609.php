<?php
    $numbers = explode(" ", trim(readline()));
    $primary = explode(" ", trim(readline()));
    $type = trim(readline());
    for ($i = 0; $i < $numbers[0]; $i++) {  // 讀取輸入
        $secondarys[] = explode(" ", trim(readline()));
    }
    foreach ($secondarys as $secondary) {
        $count = 0;
        $total = 0;
        if($type == 1){
            for ($i = 0; $i < $numbers[1]; $i++) { 
                $total += pow($primary[$i] - $secondary[$i], 2);
            }
            $output[] = sqrt($total); 
        }else{
            for ($i = 0; $i < $numbers[1]; $i++) { 
                if($secondary[$i] != $primary[$i]){
                    $count++;
                }
            }
            $output[] = $count;
        }
    }
    echo implode(" ",$secondarys[array_search(min($output), $output)]);
?>
<!-- chat gpt 寫法 -->
<!-- if($type == 1){
    $distance = sqrt(array_sum(array_map(function ($a, $b) {
        return pow($a - $b, 2);
    }, $primary, $secondary)));
    $output[] = $distance;
}else{
    $count = array_sum(array_map(function ($a, $b) {
        return $a != $b ? 1 : 0;
    }, $primary, $secondary));
    $output[] = $count;
} -->