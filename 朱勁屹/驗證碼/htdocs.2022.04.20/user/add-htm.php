<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:200px;
            display:flex;
            flex-wrap:wrap;
        }
        textarea{
            resize:none;
        }
    </style>
</head>
<body>
    <h1>新增工作</h1>
    <form action="./add.php" method="POST">
        <label style="width:100%;">
            工作名稱
            <input type="text" name="workName" requried>
        </label>
        <label style="width:50%;">
            開始時間
            <select name="startTime">
                <?php
                for($i = 0;$i < 24;$i++){
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </label>
        <label style="width:50%;">
            結束時間
            <select name="endTime">
                <?php
                for($i = 0;$i < 24;$i++){
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </label>
        <label style="width:50%;">
            處理狀態
            <select name="dealWith">
                <?php
                    $a = [0,1,2];
                    $b = ['未處理','處理中','已處理'];
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
        <label style="width:50%;">
            優先順序
            <select name="level">
                <?php
                    $e = [0,1,2];
                    $f = ['普通件','速件','最速件'];
                    foreach($f as $key=>$c){
                        if($e == $key){
                            echo "<option value='$e' selected>$c</option>";
                        }else{
                            echo "<option value='$key'>$c</option>";
                        }
                    }
                ?>    
            </select>
        </label>
        <label>
            工作內容
            <textarea name="workContent" cols="30" rows="10"></textarea>
        </label>
        <label style="width:100%;">
            日期
            <input type="date" name="date">
        </label>
        <button>新增</button>
    </form>
</body>
</html>