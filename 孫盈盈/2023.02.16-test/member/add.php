<?php
    require('setup.php');
    $name = $_POST['userName'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "INSERT INTO `user`(`name`, `account`, `password`, `log`, `level`) VALUES ('$name','$account','$password','0','$level')";
    $query = mysqli_query($connect, $sql);


    header('Location:/Emma/2023.02.16-test/member.php');