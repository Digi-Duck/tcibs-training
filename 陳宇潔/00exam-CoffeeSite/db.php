<?php
    //設定資料庫資訊
    $location = "127.0.0.1";
    $dbuser = "admin";
    $dbpassword = "1234";
    $dbname ="my_db";

    //宣告一個link變數，並進行連結資料庫函式，連結結果會帶入link當中
    $link = mysql_connect($location, $dbuser, $dbpassword, $dbname);

    //若link == true 代表已經連線
    if($link == true){
        //設定連線編碼為UTF-8
        mysql_query("SET NAMES utf8");
        //取得我要的資料庫，並帶入db變數中
        $db = mysql_select_db($dbname, $link);

        //若db == true 代表已經指定此次連結的資料庫為my_db
        if($db == true){
            echo "以正確連接資料庫： {$dbname}";
        //否則就代表連線失敗
        }else{
            echo "未連接連接資料庫： {$dbname}";
        }
    //否則就代表連線失敗
    }else{
        echo "無法連接SQL資料庫";
    }
?>