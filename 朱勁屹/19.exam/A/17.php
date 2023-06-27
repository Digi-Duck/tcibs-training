<?php
    $data = $_POST['text'];
    $data = [0];
    $f = fopen('17.json','w');
    fwrite($f,$data);
    fclose($f);
?>