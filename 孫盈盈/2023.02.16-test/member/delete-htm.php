<?php
    $id = $_POST['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .display{
            display:none;
        }
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
            margin: 10px;
            width: 100px;
            height: 50px;

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
        .true{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="nav">
            <div class="img">
                <img src="" alt="">
            </div>
            <h1>刪除user</h1>
            <div class="empty"></div>
        </div>
        <div class="true">
            <h1>確定要刪除?</h1>
            <form action="delete.php" method="POST">
                <input class="display" type="text" value="<?=$id?>" name="id">
                <button>確定</button>
            </form>
        </div>
    </div>
</body>
</html>