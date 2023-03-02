<?php
    @session_start();
    require('setup.php');

    $account = $_POST['account'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `account` = '$account'";
    $query = mysqli_query($connect ,$sql);
    $data = mysqli_fetch_assoc($query);
    $id = $data['id'];

    if(empty($data['account'])){
        echo "帳號錯誤";
    }else{
        if($password == $data['password']){
            $_SESSION['id'] = $id;
            $_SESSION['user'] = 1;

            $time = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `log-record`(`user-id`, `step`, `time`) VALUES ('$id','1','$time')";
            $query = mysqli_query($connect,$sql);
            if($data['level'] > 0){
                $sql = "UPDATE `user` SET `log`= 1 WHERE `id` = '$id'";
                $query = mysqli_query($connect ,$sql);

                header('Location:./member-use/member-use.php');
            }else{
                $sql = "UPDATE `user` SET `log`= 1 WHERE `id` = '$id'";
                $query = mysqli_query($connect ,$sql);

                header('Location:user.php');
            }
        }else{
            echo "密碼錯誤";
        }
    }