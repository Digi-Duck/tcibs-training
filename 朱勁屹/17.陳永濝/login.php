<?php
@session_start();
require('setup.php');

$account = $_POST['account'];
$password = $_POST['password'];
$code = $_POST['code'];

$sql = "SELECT * FROM `member` WHERE `account` = '$account'";
$query = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($query);

if(!isset($_SESSION['error'])){
    $_SESSION['error'] = 0;
}

if($code == $_SESSION['char']){
    if(empty($data)){
        echo "查無此帳號";
        header("Refresh:2;url=./index.php");
    }else{
        if($password == $data['password']){
            $time = date('Y-m-d H:i:s');
            $id = $data['id'];
            $_SESSION['id'] = $id;
            $_SESSION['user'] = 1;
            $s = "INSERT INTO `log-record`(`userId`, `step`, `time`) VALUES ('$id','1','$time')";
            mysqli_query($connect, $s);
            if($data['level'] == 1){
                header('Location:member.php');
            }else{
                header("Location:user.php");
            }
        }else{
            echo "密碼錯誤";
            header("Refresh:2;url=./index.php");
        }
    }
}else{
    echo "驗證碼錯誤";
    header("Refresh:2;url=./index.php");
}
$_SESSION['error']++;
if($_SESSION['error'] == 3){
    header("Location:error.html");
    header("Refresh:20;url=./index.php");
}