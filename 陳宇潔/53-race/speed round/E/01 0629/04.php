<?php
    $nums = explode(" ", trim(readline()));
    $primary = explode(" ", trim(readline()));
    $type = trim(readline());
    for($i = 0; $i < $nums[0]; $i ++){
        $secondnarys[] = explode(" ", trim(readline()));
    }
    foreach($secondnarys as $sec){
        $count = 0;
        $total = 0;
        if($type == 1){
            for($i = 0; $i < $nums[1]; $i++){
                $total += pow($primary[$i] - $sec[$i], 2);
            }
            $output[] = sqrt($total);
        }else{
            $output[] = count(array_diff_assoc($sec, $primary));
        }
    }
    echo implode(" ", $secondnarys[array_search(min($output), $output)]);
?>