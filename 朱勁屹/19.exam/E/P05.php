<?php
    $num = fgets(STDIN);
    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;


    for ($i=50; $i < $num;$i) { 
        $a++;
        $num = $num - 50;
    }
    for ($i=10; $i < $num;$i) { 
        $b++;
        $num = $num - 10;
    }
    for ($i=5; $i < $num;$i) { 
        $c++;
        $num = $num - 5;
    }
    for ($i=1; $i <= $num;$i) { 
        $d++;
        $num = $num - 1;
    }
    echo '1 '.$d.PHP_EOL;
    echo '5 '.$c.PHP_EOL;
    echo '10 '.$b.PHP_EOL;
    echo '50 '.$a.PHP_EOL;
    echo $a+$b+$c+$d;