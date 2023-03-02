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

            background-color: rgb(212, 173, 121);
            box-sizing: border-box;
        }
        .main{
            display: flex;
            flex-wrap: wrap;

            width: 100%;

            padding: 50px;

            background-color: rgb(255, 243, 220);
            box-sizing: border-box;
        }
        .float{
            display: flex;
            position: fixed;
            bottom: 10px;
            right:10px;
        }
        .card{
            position: relative;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-direction: column;
            
            width: 550px;
            height: 400px;
            
            margin: 0 20px;
            padding: 20px;
            border: 4px solid rgb(155, 116, 33);
            
            background-color:  rgb(255, 239, 210);
            box-sizing: border-box;
        }
        .div{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
            height: 100%;
        }
        .input{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100px;
            
            margin: 10px 0;
            
            font-size: 25px;
            font-weight: bolder;
        }
        input{
            width: 400px;
            height: 60px;
            
            font-size: 25px;
            
            margin: 0 0 0 20px;
        }
        .block{
            width: 225px;
            height: 50px;
            
            margin: 20px 0px;
            padding: 10px;
            
            border:0px;
            background-color:  rgb(255, 255, 255);
            box-sizing: border-box;
            
            font-size: 20px;
            font-weight: bolder;
        }
        .image{
            width: 225px;
            height: 225px;
            
            margin: 20px 0px;
            padding: 0;
            
            background-color: rgb(255, 255, 255);
            background-size: cover;
            background-repeat: no-repeat;
            
            font-size: 20px;
            text-align: center;
            line-height: 225px;
        }
        .textarea{
            width: 225px;
            height: 100px;
            
            background-color: rgb(255, 255, 255);
            
            resize: none;
            
            padding: 0;
            border: 0;
            
            font-size: 15px;
        }
        button{
            margin: 10px;
            width: 100px;
            height: 50px;
        
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
        .search{
            width:450px;
            height: 50px;

            display: flex;
            align-items: center;

            border: 2px solid #b8916c;
            background-color: rgb(240, 219, 161);
           
            border-radius: 10px;
        }
        .check{
            height: 100%;

            border-radius: 10px;
            border: 1px solid #b8916c00;
            background-color: rgb(240, 219, 161);

            font-size: 25px;
        }
        .check:focus-visible{
            outline: none;
            border-bottom: none;
        }
        .check-btn{
            width: 100%;
            height: 100%;

            margin: 0;
            border-radius:0 10px 10px 0 ;
            border: 1px solid #b8916c00;
            border-left: 2px solid #b8916c;
            background-color: rgb(247, 218, 141);

            font-weight: bolder;
            font-size: 23px;
            color: #b98554;
        }
        </style>
</head>
<body>
    <div class="all">
        <div class="nav">
            <div class="img">
                <img src="" alt="">
            </div>
            <div class="search">
                <input class="check" type="search" placeholder="請輸入商品名稱">
                <button class="check-btn">
                    查詢
                </button>
            </div>
            <form action="./add-goods.php">
                <button>上架</button>
            </form>
        </div>
        <div class="main">
            <?php
            require('setup.php');
            $sql = "SELECT * FROM `goods` WHERE 1";
            $query = mysqli_query($connect, $sql);
            $data = mysqli_fetch_all($query,MYSQLI_ASSOC);
            foreach($data as $a){
                $style_id = $a['style'];
                $sql_version = "SELECT * FROM `version` WHERE `id` = '$style_id'";
                $query_version = mysqli_query($connect, $sql_version);
                $data_version = mysqli_fetch_assoc($query_version);
            ?>
                <div class="card">
                    <div class="div">
                        <?php
                            echo $data_version['block1'];
                            echo $data_version['block2'];
                            echo $data_version['block3'];
                            echo $data_version['block4'];
                        ?>
                    </div>
                    <div class="div">
                        <?php
                            echo $data_version['block5'];
                            echo $data_version['block6'];
                        ?>
                    </div>
                </div>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsName" value="<?=$a['goods-name'];?>" hidden>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsIntro" value="<?=$a['goods-intro'];?>" hidden>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsLink" value="<?=$a['goods-link'];?>" hidden>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsCost" value="<?=$a['goods-cost'];?>" hidden>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsImg" value="<?=$a['goods-img'];?>" hidden>
                <input class="answer" type="text" data-set="<?=$a['id'] - 1;?>" name="goodsDate" value="<?=$a['goods-date'];?>" hidden>

            <?php
                }
            ?>

        </div>
        <div class="float">
            <form action="/Emma/2023.02.16-test/logout.php">
                <button>登出</button>
            </form>
            <form action="/Emma/2023.02.16-test/member.php">
                <button>管理後臺</button>
            </form>
        </div>
    </div>
    <script>
        let answers = document.querySelectorAll('.answer');
        let blocks = document.querySelectorAll('.block');
        let cards = document.querySelectorAll('.card');

        cards.forEach((card,index)=>{
            answers.forEach((answer)=>{
                if(answer.dataset.set == index){
                    blocks.forEach((block)=>{
                        if(block.name == answer.name){
                            console.log(answer.value);
                            block.value = answer.value;
                            console.log(answer.name);
                            if(block.name == 'goodsImg'){
                                block.setAttribute('src',answer.value);
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>