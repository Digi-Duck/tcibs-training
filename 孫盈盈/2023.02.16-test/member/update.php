<?php
    require('setup.php');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $sql = "UPDATE `user` SET `name`='$name',`account`='$account',`password`='$password',`level`='$level' WHERE `id`='$id'";
    $query = mysqli_query($connect, $sql);


    header('Location:/Emma/2023.02.16-test/member.php');