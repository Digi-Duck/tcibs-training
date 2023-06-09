<?php
    echo '請輸入一個正整數n: ';
    $n = trim(fgets(STDIN));
    $O = 0;
    $X = 0;

    for ($i=0; $i < $n; $i++) { 
        $arr[$i] = str_split(trim(fgets(STDIN)), 1);
    }

    foreach ($arr as $i => $col) {
        foreach ($col as $j => $row) {
            if ($row == 'O') {
                $Orow = 1;
            }else{
                $Orow = 0;
                break;
            }
        }
        foreach ($col as $j => $row) {
            if ($arr[$j][$i] == 'O') {
                $Ocol = 1;
            }else{
                $Ocol = 0;
                break;
            }
        }
        $O += $Orow;
        $O += $Ocol;
    }

    foreach ($arr as $i => $col) {
        if ($col[$i] == 'O') {
            $Oslash = 1;
        }else{
            $Oslash = 0;
            break;
        }
    }
    $O += $Oslash;
    foreach ($arr as $i => $col) {
        if ($col[$n-1-$i] == 'O') {
            $Oslash = 1;
        }else{
            $Oslash = 0;
            break;
        }
    }
    $O += $Oslash;

    foreach ($arr as $i => $col) {
        foreach ($col as $j => $row) {
            if ($row == 'X') {
                $Xrow = 1;
            }else{
                $Xrow = 0;
                break;
            }
        }
        foreach ($col as $j => $row) {
            if ($arr[$j][$i] == 'X') {
                $Xcol = 1;
            }else{
                $Xcol = 0;
                break;
            }
        }
        $X += $Xrow;
        $X += $Xcol;
    }
    foreach ($arr as $i => $col) {
        if ($col[$i] == 'X') {
            $Xslash = 1;
        }else{
            $Xslash = 0;
            break;
        }
    }
    $X += $Xslash;
    foreach ($arr as $i => $col) {
        if ($col[$n-1-$i] == 'X') {
            $Xslash = 1;
        }else{
            $Xslash = 0;
            break;
        }
    }
    $X += $Xslash;

    if ($O > $X) {
        echo 'O';
    }elseif ($X > $O){
        echo 'X';
    }else{
        echo '?';
    }
?>