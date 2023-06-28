<?php
    $input = explode(" ", trim(readline()));
    $amount = trim(readline());
    for ($i = 0; $i < $amount; $i++) {
        $words[] = trim(readline());
    }
    $queue = [[$input[0]]]; //未訪問
    $visited = [$input[0]]; //已訪問
    $found = false; //終止
    while (!empty($queue)) {
        $path = array_shift($queue); // 從陣列中取出並刪除第一個元素
        $lastWord = end($path);
        if ($lastWord == $input[1]) {
            $found = true;
            break;
        }
        foreach ($words as $w) {
            $diff = 0;
            for ($i = 0; $i < strlen($lastWord); $i++) {
                if ($lastWord[$i] != $w[$i]) {
                    $diff++;
                }
            }
            if ($diff == 1) {
                $neighbors[] = $w;
            }
        }
        foreach ($neighbors as $neighbor) { // 如果鄰居單字尚未訪問過
            if (!in_array($neighbor, $visited)) {
                $visited[] = $neighbor; // 將鄰居單字加入已訪問的單字列表
                $newPath[] = $path; // 複製當前單字序列
                $newPath[] = $neighbor; // 將鄰居單字加入複製的單字序列
                $queue[] = $newPath; // 將新的單字序列加入待處理的單字序列
            }
        }
    }
    echo $found ? count($path) : 0;
?>
