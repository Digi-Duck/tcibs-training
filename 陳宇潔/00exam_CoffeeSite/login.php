<?php
    require("db.php");
    session_start();

    //取得傳過來的帳號密碼
    $account = $_POST['account'];
    $password = $_POST['password'];
        
    $db_account = "SELECT * FROM `login` WHERE `account` = '$account'";
    $query = mysqli_query($link, $db_account); //資料庫連結
    $fetch = mysqli_fetch_assoc($query); 

    if(empty($account) && empty($password)){
        $_SESSION['msg'] = "請輸入帳號和密碼";
        header("Location: index.php");
    }else if(empty($password)){
        $_SESSION['msg'] = "請輸入密碼";
        header("Location: index.php");
    }else if(empty($account)){
        $_SESSION['msg'] = "請輸入帳號";
        header("Location: index.php");
    }else if(empty($fetch)){
        $_SESSION['msg'] = "此帳號不存在，請檢查";
        header("Location: index.php");
    }else if(empty($db_account) && $fetch['password'] != $password){
        $_SESSION['msg'] = "帳號和密碼有誤，請檢查";
        header("Location: index.php");
    }else if($fetch['password'] != $password){
        $_SESSION['msg'] = "密碼有誤，請檢查";
        header("Location: index.php");
    }else if($fetch['password'] == $password){
        $_SESSION['msg'] = '';
        if($fetch['level'] > 0){
            header("Location: admin.php");
        }else{
            header("Location: user.php");
        }
    }
    // }else if(){
    //     $_SESSION['is_login'] == FALSE;
    //     $_SESSION['msg'] == "圖形驗證碼有誤";
    // }
    function false(){
        $_SESSION['is_login'] = FALSE;
        header("Location: index.php");
    }
?>