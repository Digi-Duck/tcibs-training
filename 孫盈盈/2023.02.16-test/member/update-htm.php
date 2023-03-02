<?php
            require('setup.php');
            $id = $_POST['id'];

            $sql = "SELECT * FROM `user` WHERE `id`='$id'";
            $query = mysqli_query($connect,$sql);
            $data = mysqli_fetch_assoc($query);
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="./update.php" method="POST">
        姓名
        <input type="text" value="<?=$data['name'];?>" name="name">
        帳號
        <input type="text" value="<?=$data['account'];?>" name="account">
        密碼
        <input type="text" value="<?=$data['password'];?>" name="password">
        權限
        <select name="level">
            <?php

                $a = $data['level'];
                echo $a;
                $b = ['使用者','管理者'];

                foreach($b as $key => $c){
                    if($a == $key){
                        echo "<option value='$a'selected>$c</option>";
                    }else{
                        echo"<option value='$key'>$c</option>";
                    }
                }
            ?>
        </select>
        <input style="display:none;" type="text" value="<?=$id;?>" name="id">
        <button>更改</button>
   </form>
</body>
</html>