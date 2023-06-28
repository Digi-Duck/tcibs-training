<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入失敗</title>
    <style>
        .title{
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="title">
        <?php
            echo "<h1>".$_SESSION['num']."</h1>";
        ?>
    </div>
</body>
</html>