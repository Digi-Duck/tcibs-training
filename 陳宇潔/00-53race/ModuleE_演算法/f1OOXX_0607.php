<?php
    $lines = trim(readline()); //讀取OOXX的大小 
    for ($i = 0; $i < $lines; $i++) {
        $line = trim(readline());
        $matrix[] = str_split($line); //OOXX本人
    }
    $isO = false;
    $isX = false;
    for ($i = 0; $i < $lines; $i++) { //橫排
        if (checkLine($matrix[$i], 'O')) {
            $isO = true;
        }
        if (checkLine($matrix[$i], 'X')) {
            $isX = true;
        }
    }
    for ($i = 0; $i < $lines; $i++) { //直排
        for ($j = 0; $j < $lines; $j++) {
            $column[] = $matrix[$j][$i];
        }
        if (checkLine($column, 'O')) {
            $isO = true;
        }
        if (checkLine($column, 'X')) {
            $isX = true;
        }
    }
    for ($i = 0; $i < $lines; $i++) {
        $diagonal1[] = $matrix[$i][$i];
        $diagonal2[] = $matrix[$i][$lines - 1 - $i];
    }
    if (checkLine($diagonal1, 'O') || checkLine($diagonal2, 'O')) {
        $isO = true;
    }
    if (checkLine($diagonal1, 'X') || checkLine($diagonal2, 'X')) {
        $isX = true;
    }
    function checkLine($line, $OX) {
        return !in_array(false, array_map(function ($char) use ($OX) { return $char == $OX; }, $line));
            // 如果存在 false，表示在 $line 陣列中有至少一個元素不等於 $OX。 !還傳ture
    }
    if ($isO && $isX) {
        echo '?';
    } elseif ($isO) {
        echo 'O';
    } elseif ($isX) {
        echo 'X';
    } else {
        echo '?';
    }
    // in_array —> 檢查一個值是否存在於數組中
    // in_array ( mixed 搜索到的值 , array 陣列):布爾值

    // array_map -> 返回一個數組callback，其中包含將 應用於相應值array 
    // array_map(myfunction,array1,array2,array3...)
?>
