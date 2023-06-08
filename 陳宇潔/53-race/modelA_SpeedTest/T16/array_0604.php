<?php
    $factor = isset($_GET['factor']) ? $_GET['factor'] : 1;

    function show($number) {
        global $factor;
        if ($number <= 39) {
            $isMultiple = !(($number + 1) % $factor) ? " is a multiple of ".$factor."**" : "";
            echo "\t[$number] => " . ($number + 1) . $isMultiple . "<br>";
            show($number + 1);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>操作 Array</title>
    <style>
        pre {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    Modified Array
    <br>
    (<pre><?php show(0); ?></pre>)
</body>
</html>
