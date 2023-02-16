<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    <table>
        <tr>
            <th>使用者名稱</th>
            <th>登出/入</th>
            <th>時間</th>
        </tr>
        <?php
        require('setup.php');
        $id = $_POST['id'];
        $sql = "SELECT * FROM `log-record` WHERE `userId`='$id'";
        $query = mysqli_query($connect,$sql);
        $data = mysqli_fetch_all($query,MYSQLI_ASSOC);
        foreach($data as $a){
        ?>
        <tr>
            <td><?php
            $userId = $a['userId'];
                $s = "SELECT * FROM `member` WHERE `id` = '$userId'";
                $q = mysqli_query($connect,$s);
                $d = mysqli_fetch_assoc($q);
                $userName = $d['userName'];
                echo $userName;
            ?></td>
            <td><?php
                if($a['step'] == 1){
                    echo "登入";
                }else{
                    echo "登出";
                }
            ?></td>
            <td><?=$a['time']?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <a href="/htdocs.2022.04.20/member.php">返回</a>
</body>
</html>