<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新增user</h1>
    <form action="./add.php" method="POST">
        <label>
            使用者名稱
            <input type="text" name="userName" required>
        </label>
        <label>
            帳號
            <input type="text" name="account" required>
        </label>
        <label>
            密碼
            <input type="text" name="password" reuqired>
        </label>
        <label>
            權限
            <select name="level">
                <?php
                $a = [0,1];
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
        <button>新增</button>
    </form>
</body>
</html>