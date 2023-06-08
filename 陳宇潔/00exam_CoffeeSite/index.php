<?php
    //啟動session
    session_start();
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>咖啡商品展示系統</title>
</head>
<body>
    <div class="nav">
        <img src="./img/coffee.jpg" class="mainpng">
        <div class="title center">
                    咖啡商品展示系統
                </div>
    </div>
    <div class="padding"></div>
    <form action="login.php" method="post">
        <div class="center">
            <div class="bg">
                <div class="content">
                    <?php
                        echo "<p>".$_SESSION['msg']."</p>";
                    ?>
                    <div class="group">
                        <span>帳號</span> 
                        <input type="text" name="account" placeholder="請輸入帳號">
                    </div>
                    <div class="group">
                        <span>密碼</span>
                        <input type="password" name="password" placeholder="請輸入密碼">
                    </div>
                    <div class="group">  
                        <span>驗證碼</span>      
                        <div class="verify">
                            <div class="room">
                                <div class="box">
                                    <img id="0" class="img" src="verify0.php" draggable="true">
                                </div>
                                <div class="box">
                                    <img id="1" class="img" src="verify1.php" draggable="true">
                                </div>
                                <div class="box">
                                    <img id="2" class="img" src="verify2.php" draggable="true">
                                </div>
                                <div class="box">
                                    <img id="3" class="img" src="verify3.php" draggable="true">
                                </div>
                            </div>
                            <button type="button" class="refresh">重新產生</button>
                        </div>
                    </div>
                    <div class="group">
                        <span>由小到大排列</span>
                        <div class="verify">
                            <div class="box"></div>
                            <div class="box"></div>
                            <div class="box"></div>
                            <div class="box"></div>
                        </div>
                    </div>
                    <input type="text" name="verify" class="hidden" hidden>
                    <div class="group">
                        <button type="button" class="clear">清除</button>
                        <button type="submit">登入</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./js/index.js"></script>
</body>
</html>