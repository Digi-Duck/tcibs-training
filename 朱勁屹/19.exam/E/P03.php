<?php
$num = trim(fgets(STDIN));
for ($ii=0; $ii < $num; $ii++) { 
    $n = trim(fgets(STDIN));
    
    $arr = array();
    $bbb = array();

    for ($i=2; $i < $n; $i++) { 
        $arr[$i] = $i;
    }
    $bbb = a(2,$n,$bbb);

    $bbb = array_count_values($bbb);
    foreach ($bbb as $key => $value) {
        if($value <= 1){
            echo $key.'*';
        }elseif($key == count($bbb)){
            echo $key.'^'.$value;
        }else{
            echo $key.'^'.$value.'*';

        }
    }

    
}
function a($value,$n,$bbb)
{
    if($n == 1){
        return $bbb;
    }elseif($n % $value == 0){
        $n = $n / $value; 
        $bbb = a($value,$n,$bbb);
        array_push($bbb,$value);
        return $bbb;
    }else{
        $bbb = a($value + 1,$n,$bbb);
        return $bbb;
    }
}

?>