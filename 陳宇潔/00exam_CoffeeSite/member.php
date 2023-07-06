<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/member.css">
    <title>會員管理</title>
</head>
<body>
    <div class="nav">
        <img src="./img/coffee.jpg" class="mainpng">
        <div class="title center">
            咖啡商品展示系統 會員管理
        </div>
    </div>
    <div class="padding"></div>
    <table>
        <thead>
            <tr>
                <th>編號</th>
                <th>使用者名稱</th>
                <th>帳號</th>
                <th>密碼</th>
                <th>權限</th>
                <th>功能</th>
            </tr>
        </thead>
        <tbody>
            <?php
            ?>
        </tbody>
    </table>
    <div class="box" id="float">
        <a href="./admin.php">
            <button class="button btn">離開</button>
        </a>
    <div>
    <script src="./js/member.js"></script>
</body>
</html>