<?php
require('setup.php');

$id = $_POST['id'];

$sql = "SELECT * FROM `member` WHERE `id` = '$id'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($query);
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
    </style>
</head>
<body>
    <h1>更改user</h1>
    <form action="./update.php" method="POST">
        <label>
            使用者名稱
            <input type="text" name="userName" value="<?=$data['userName']?>" required>
        </label>
        <label>
            帳號
            <input type="text" name="account" value="<?=$data['account'];?>" required>
        </label>
        <label>
            密碼
            <input type="text" name="password" value="<?=$data['password'];?>" reuqired>
        </label>
        <label>
            權限
            <select name="level">
                <?php
                $a = $data['level'];
                $b = ['使用者','管理者'];
                foreach($b as $key=>$c){
                    if($a == $key){
                        echo "<option value='$a' selected>$c</option>";
                    }else{
                        echo "<option value='$key'>$c</option>";
                    }
                }
                ?>
            </select>
        </label>
        <button>更改</button>
        <input class="display" type="text" name="id" value="<?=$data['id'];?>">
    </form>
</body>
</html>