<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body,html{
            height: 100%;
            margin:0;
        }
        .all{
            width: 100%;
            height: 100%;

            background-color: rgb(255, 243, 220);
        }
        .nav{
            display: flex;
            justify-content: space-between;
            align-items: center;

            width: 100%;
            height: 70px;

            padding: 0 20px;

            background-color: rgb(212, 173, 121);
            box-sizing: border-box;
        }
        button{
            margin-right: 5px;
            width: 80px;
            height: 40px;

            font-size: 20px;

            border-radius: 10px;
            border: 2px solid #b8916c;
            background-color: rgb(247, 218, 141);

            font-weight: bolder;
            color: #b98554;
        }
        button:hover{
            border: 2px solid rgb(255, 255, 255);
            background-color: rgb(212, 159, 90);

            font-weight: bolder;
            color: #ffffff;
        }
        .input{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100px;

            margin: 10px 0;

            font-size: 25px;
            font-weight: bolder;
        }
        input{
            width: 400px;
            height: 60px;

            font-size: 25px;

            margin: 0 0 0 20px;
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="nav">
            <div class="img">
                <img src="" alt="">
            </div>
        </div>>    
        <form action="./login.php" method="POST">
            <div class="input">
                帳號
                <input type="text" name="account">
            </div>
            <div class="input">
                密碼
                <input type="password" name="password">
            </div>
            <div class="input">
                驗證碼
            </div>
            <div class="input">
                <button type="submit">登入</button>
            </div>
        </form>
    </div>
</body>
</html>