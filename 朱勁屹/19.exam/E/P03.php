<?php
    $n = trim(fgets(STDIN));
    $arr = array();
    $bbb = array();

    for ($i=2; $i < $n; $i++) { 
        $arr[$i] = $i;
    }
    foreach ($arr as $key => $value) {
        $bbb = a($value,$n,$bbb);
    }
    print_r($bbb);
    function a($value,$n,$bbb)
    {
        if($value == 1){
            return $bbb;
        }elseif($n % $value == 0){
            $n = $n / $value; 
            array_push($bbb,$value);
            $bbb = a($value,$n,$bbb);
            return $bbb;
        }else{
            return $bbb;
        }
    }

?>