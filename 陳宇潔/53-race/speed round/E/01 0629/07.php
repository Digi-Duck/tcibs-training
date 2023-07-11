<?php
    $input = explode(" ", trim(readline()));
    $amount = trim(readline());
    for ($i = 0; $i < $amount; $i ++) { 
        $words[] = trim(readline());
    }
    $queue = [[$input[0]]];
    $visited = [$input[0]];
    $found = false;
    while(!empty($queue)){
        $path = array_shift($queue);
        $lastWord = end($path);
        if ($lastWord == $input[1]) {
            $found = true;
            break;
        }
        foreach($words as $w){
            $diff = 0;
            for($i = 0; $i < strlen($lastWord); $i++){
                if($lastWord[$i] != $w[$i]){
                    $diff++;
                }
            }
            if($diff == 1){
                $neighbors[] = $w;
            }
        }
        foreach($neighbors as $neighbor){
            if(!in_array($neighbor, $visited)){
                $visited[] = $neighbor;
                $newPath = array_merge($path, [$neighbor]);// 初始化新路径并将邻居单词添加到新路径中
                $queue[] = $newPath;
            }
        }
    }
    echo $found ? count($path) : 0;
?>