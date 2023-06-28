
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>管理者</title>
</head>
<body>
    <div class="nav">
        <div id="toTop"></div>
        <div class="box">
            <input type="search" placeholder="請輸入商品名稱">
            <button class="searchBtn btn" type="submit">Go</button>
        </div>
        <div class="title center">
            咖啡商品展示系統
        </div>
        <div class="box">
            <a href="./product.php">
                <button class="button btn">上架商品</button>
            </a>
            <a href="./member.php">
                <button class="button btn">會員管理</button>
            </a>
        </div>
    </div>
    <div class="box" id="float">
        <a href="./index.php">
            <button class="button btn">登出</button>
        </a>
        <a href="#toTop">
            <button class="button btn">回到首頁</button>
        </a>
    </div>
    
    <script src="./js/admin.js"></script>
</body>
</html>