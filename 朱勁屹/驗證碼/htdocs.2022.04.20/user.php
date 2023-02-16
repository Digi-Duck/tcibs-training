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
        .box > p{
            margin:0;
        }
        .box{
            background-color:yellow;
            display:flex;
            width:100px;
            flex-wrap:wrap;
            text-align:center;
            justify-content:center;
            margin:0 10px 10px 0;
        }
        .banner{
            display:flex;
            margin:auto;
        }
    </style>
</head>
<body>
    <h1>工作列表</h1>
    <div class="banner">
        <?php
        @session_start();
        $id = $_SESSION['id'];
        require('setup.php');
        $sql = "SELECT * FROM `to-do-work` WHERE `userId`='$id'";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($data as $a){
        ?>
        <div class="box">
            <p style="width:100%;"><?=$a['startTime'];?>:00~<?=$a['endTime'];?>:00</p>
            <p style="width:100%;"><?=$a['workName'];?></p>
            <p style="width:100%;"><?php
            if($a['dealWith'] == 0){
                echo "未處理";
            }else if($a['dealWith'] == 1){
                echo "處理中";
            }else{
                echo "已處理";
            }
                ?></p>
            <p style="width:100%;"><?php
            if($a['level'] == 0){
                echo "普通件";
            }else if($a['level'] == 1){
                echo "速件";
            }else{
                echo "最速件";
            }
                ?></p>
            <div>
                <form action="./user/update-htm.php" method="POST">
                    <input class="display" type="text" name="id" value="<?=$a['id'];?>">
                    <button>更改</button>
                </form>
                <form action="./user/delete.php" method="POST">
                    <input class="display" type="text" name="id" value="<?=$a['id'];?>">
                    <button>刪除</button>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>  
    </table>
    <form action="./user/add-htm.php">
        <button>新增</button>
    </form>
    <a href="./logout.php">登出</a>
</body>
</html>