


    require("setup.php");

    $account = $_POST['account'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `log` WHERE `account` = '$account'";
    $query = mysqli_query($connect, $sql);
    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);

    if(empty($account) || empty($password)){
        require("index.php");
        echo "請輸入帳號密碼";
    }else if(empty($account)){
        require("index.php");
        echo "請輸入帳號";
    }else if(empty($password)){
        require("index.php");
        echo "請輸入密碼";
    }else if(empty($data)){
        echo "帳號不存在";
    }else if($password == $data[0]['password']){
        echo "登入成功";
        
    }else{
        echo "登入失敗";
    }