<?php
    $input = intval(trim(readline()));
    $coins = array(1, 5, 10, 50);
    $amount = array(0, 0, 0, 0);
    $total = 0;

    for ($i = 3; $i >= 0; $i--) { 
        $amount[$i] = intdiv($input, $coins[$i]);
        $input %= $coins[$i];
    }
    foreach ($coins as $i => $coin) {
        echo $coin . ' ' . $amount[$i] . "\n";
        $total += $amount[$i];
    }
    echo $total;
?>

