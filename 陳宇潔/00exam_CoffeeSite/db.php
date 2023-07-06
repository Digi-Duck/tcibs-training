<?php
    //設定資料庫資訊
    $host = "localhost";
    $dbuser = "admin";
    $dbpassword = "1234";
    $dbname ="my_db";

    //宣告一個link變數，並進行連結資料庫函式，連結結果會帶入link當中
    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
?>