<?php
    $data = $_POST['text'];
    $f = fopen('17.json','w');
    fwrite($f,$data);
    fclose($f);
?>