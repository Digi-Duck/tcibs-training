<?php
    require('setup.php');

    $id = $_POST['id'];
    $sql = "DELETE FROM `user` WHERE `id`= '$id'";
    $query = mysqli_query($connect, $sql);
    
    header("Location:/Emma/2023.02.16-test/member.php");

