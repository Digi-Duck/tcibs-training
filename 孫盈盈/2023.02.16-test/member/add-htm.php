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
            margin-bottom: 40px;

            background-color: rgb(212, 173, 121);
            box-sizing: border-box;
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
        input,select{
            width: 400px;
            height: 60px;

            font-size: 25px;

            margin: 0 0 0 20px;
        }
        button{
            margin: 10px;
            width: 500px;
            height: 50px;

            font-size: 30px;

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
    </style>
</head>
<body>
    <div class="all">
        <div class="nav">
                <div class="img">
                    <img src="" alt="">
                </div>
                <h1>新增 user</h1>
                <div class="empty"></div>
            </div>
        <form action="./add.php" method="POST">
            <div class="input">
                姓名
                <input type="text" name="userName" required>
            </div>
            <div class="input">
                帳號
                <input type="text" name="account" required>
            </div>
            <div class="input">
                密碼
                <input type="text" name="password" required>
            </div>
            <div class="input">
                權限
                <select name="level">
                    <?php
                        $a = [0,1];
                        $b = ['使用者','管理者'];

                        foreach ($b as $key => $c) {
                            if($a == $key){
                                echo "<option value='$a'>$c</option>";
                            }else{
                                echo "<option value='$key'>$c</option>";
                            }
                        }
                    ?>

                </select>
            </div>
            <div class="input">
                <button>新增</button>
            </div>
        </form>
    </div>
</body>
</html>