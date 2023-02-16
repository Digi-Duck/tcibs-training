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
        table,td,th{
            border:1px solid black;
        }
        td,th{
            width: 20%;
        }
        table{
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>user列表</h1>
    <table>

        <tr>
            <th>使用者名稱</th>
            <th>帳號</th>
            <th>密碼</th>
            <th>權限</th>
            <th>動作</th>
        </tr>
        <?php
        require('setup.php');
        $sql = "SELECT * FROM `member` WHERE 1";
        $query = mysqli_query($connect, $sql);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($data as $a){
        ?>
        <tr>
            <td><?=$a['userName'];?></td>
            <td><?=$a['account'];?></td>
            <td><?=$a['password'];?></td>
            <td><?php
            if($a['level'] == 1){
                echo "管理員";
            }else{
                echo "使用者";
            }
                ?></td>
            <td>
                <form action="./member/update-htm.php" method="POST">
                    <input class="display" type="text" name="id" value="<?=$a['id'];?>">
                    <button>更改</button>
                </form>
                <form action="./member/delete.php" method="POST">
                    <input class="display" type="text" name="id" value="<?=$a['id'];?>">
                    <button>刪除</button>
                </form>
                <form action="./member/log-record.php" method="POST">
                    <input class="display" type="text" name="id" value="<?=$a['id'];?>">
                    <button>登出/入紀錄</button>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
        
    </table>
    <form action="./member/add-htm.php">
        <button>新增</button>
    </form>
    <a href="./logout.php">登出</a>
</body>
</html>