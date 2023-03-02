<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body,html{
            height: 100%;
            margin:0;
        }
        .all{
            width: 100%;
            height: 100%;

            background-color: rgb(255, 243, 220);
        }
        .nav{
            display: flex;
            justify-content: space-between;
            align-items: center;

            width: 100%;
            height: 70px;

            padding: 0 20px;
            margin-bottom: 40px;

            background-color: rgb(212, 173, 121);
            box-sizing: border-box;
        }
        .display{
            display:none;
        }
        table,td,th{
            border:1px solid black;
        }
        table{
            width: 50%;

            border:5px solid rgb(102, 68, 25);
            border-spacing:0 ;
        
            margin: auto;
        }
        th{
            width: 10%;
            height: 60px;

            font-size: 20px;

            border: 5px solid rgb(170, 105, 19);
            box-sizing: border-box;
        }
        .play{
            display: flex;
            position: absolute;

            right: 10px;
            bottom: 10px;
        }
        .button{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        button{
            margin-right: 5px;
            width: 80px;
            height: 40px;

            font-size: 20px;

            border-radius: 10px;
            border: 2px solid #b8916c;
            background-color: rgb(247, 218, 141);

            font-weight: bolder;
            color: #b98554;
        }
        button:hover{
            border: 2px solid rgb(255, 255, 255);
            background-color: rgb(212, 159, 90);

            font-weight: bolder;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="all">
        <div class="nav">
            <div class="img">
                <img src="" alt="">
            </div>
            <h1>user 列表</h1>
            <div class="empty"></div>
        </div>
        <table>
            <tr>
                <th>編號</th>
                <th>使用者名稱</th>
                <th>帳號</th>
                <th>密碼</th>
                <th>登入狀態</th>
                <th>權限</th>
                <th>功能</th>
            </tr>
            <?php
                require('setup.php');
                $sql = "SELECT * FROM `user` WHERE 1";
                $query = mysqli_query($connect,$sql);
                $data = mysqli_fetch_all($query,MYSQLI_ASSOC);

                foreach($data as $a){
                    ?>
                <tr>
                    <th><?php
                        $id = $a['id'] - 1;
                        echo "000$id";
                    ?></th>
                    <th><?=$a['name'];?></th>
                    <th><?=$a['account'];?></th>
                    <th><?=$a['password'];?></th>
                    <th><?php
                            if($a['log'] == 1){
                                echo '上線中';
                            }else{
                                echo '離線';
                            }
                            ?></th>
                    <th><?php
                        if ($a['level'] > 0) {
                            echo '管理員';
                        }else{
                            echo '使用者';
                        }
                    ?></th>
                    <th class="button">
                        <form action="./member/update-htm.php" method="POST">
                            <input class="display" type="text" value="<?=$a['id'];?>" name="id">
                            <?php
                            if($id == 0){
                                echo"";
                            }else{
                                echo"<button>更改</button>";
                            }
                            ?>
                        </form>
                        <form action="./member/delete-htm.php" method="POST">
                            <input class="display" type="text" value="<?=$a['id'];?>" name="id">
                            <?php
                            if($id == 0){
                                echo"";
                            }else{
                                echo"<button>刪除</button>";
                            }
                            ?>
                        </form>
                    </th>
                </tr>
                    <?php
                }
            ?>
        </table>
    </div>
    <div class="play">
        <form action="./member/add-htm.php">
            <button>新增</button>
        </form>
        <div class="catch">
            <button>回首頁</button>
        </div>
    </div>
    <script>
        let catchs = document.querySelector('.catch');
        let time_start;
        let time_end;
        let time;
        
        
        
        catchs.addEventListener('click',()=>{
            localStorage.clear();
            location.href="./member-use/member-use.php";
        })
        // console.log(time);
        
        // if(localStorage.getItem(time_start) != null){
        //     setInterval(()=>{
        //         time = window.localStorage.getItem(time_start);
        //         time_end =  new Date().getTime();
        //         let timeout = time_end - time;
        //         console.log(timeout);
                
        //         if(timeout > 60000){
        //             location.href="./member-true.php";
                    
        //             localStorage.clear();
        //         }
        //     },1000)
        // }else{
        //     let time_open = new Date().getTime();
        //     window.localStorage.setItem(time_start, time_open);
        //     location.href="./member.php";
        // }

    </script>
</body>
</html>