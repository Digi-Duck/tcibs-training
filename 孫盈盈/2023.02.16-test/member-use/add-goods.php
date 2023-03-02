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
        .main{
            width: 100%;

            background-color: rgb(255, 243, 220);
        }
        .head{
            display: flex;
            box-sizing: border-box;
        }
        .flow{
            width: 25%;
            height: 60px;

            background-color: rgb(138, 104, 52);
            border: 3px solid  rgb(255, 243, 220);

            font-size: 25px;
            font-weight: bolder;
            text-align: center;
            line-height: 60px;

            color: rgb(255, 255, 255);

            margin-bottom: 30px;
        }
        .active{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;

            width: 100%;
            height: 100%;
        }
        .card{
            position: relative;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-direction: column;

            width: 550px;
            height: 400px;
            
            padding: 20px;
            border: 4px solid rgb(155, 116, 33);
            
            background-color:  rgb(255, 239, 210);
            box-sizing: border-box;
        }
        .radio{
            width: 40px;
            height: 40px;
            
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        input:checked{
            border-radius: 20px;
            background-color: aqua;
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
            width: 230px;
            height: 50px;
            
            margin: 10px 0px;
            padding: 10px;
            
            border:0px;
            background-color:  rgb(255, 255, 255);
            box-sizing: border-box;
            
            font-size: 20px;
            font-weight: bolder;
        }
        .image{
            width: 230px;
            height: 250px;

            margin: 10px 0px;
            padding: 0;

            background-color: rgb(255, 255, 255);
            background-size: cover;
            background-repeat: no-repeat;
            
            font-size: 20px;
            text-align: center;
            line-height: 230px;
        }
        .textarea{
            width: 230px;
            height: 100px;

            background-color: rgb(255, 255, 255);
            
            resize: none;
            
            padding: 0;
            border: 0;
            
            font-size: 15px;
        }
        .div{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            
            height: 100%;
        }
        .no{
            background-color: rgb(255, 224, 177);
            border: 3px solid rgb(155, 116, 33);
            color: rgb(155, 116, 33);
        }
        .none{
            display: none;
        }
        .hidden{
            width: 0;
            height: 0;
        }
        </style>
</head>
<body>
    <div class="all">
        <div class="nav">
            <div class="img">
                <img src="" alt="">
            </div>
            <form action="./member-use.php">
                <button>離開</button>
            </form>
        </div>
        <div class="main">
            <div class="head">
                <div class="flow">選擇版型</div>
                <div class="flow no">填寫資料</div>
                <div class="flow no">預覽</div>
                <div class="flow no">確定送出</div>
            </div>
            <div class="add-goods">
                <div class="active">
                <?php
                    require('setup.php');

                    $sql = "SELECT * FROM `version` WHERE 1";
                    $query = mysqli_query($connect,$sql);
                    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);

                    foreach($data as $b){
                            ?>
                    <div class="card">
                        <!-- <div class="div"> -->
                            <?php
                                echo $b['block1'];
                                echo $b['block2'];
                                echo $b['block3'];
                                echo $b['block4'];
                            ?>
                        <!-- </div>
                        <div class="div"> -->
                            <?php
                                echo $b['block5'];
                                echo $b['block6'];
                            ?>
                        <!-- </div> -->
                        <label for="">
                            <input class="radio" type="radio" name="card" value="<?=$b['id'];?>">
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="active none">
                <div class="input">
                        商品名稱:
                        <input class="in" type="text" name="goodsName" required>
                    </div>
                    <div class="input">
                        商品簡介:
                        <input class="in" type="text" name="goodsIntro" required required>
                    </div>
                    <div class="input">
                        相關連結:
                        <input class="in" type="link" name="goodsLink" required>
                    </div>
                    <div class="input">
                        商品價格:
                        <input class="in" type="number" name="goodsCost" required>
                    </div>
                    <div class="input">
                        商品照片:
                        <input class="in" type="file" name="goodsImg" required>
                    </div>
                </div>
                <div class="active none"></div>
                <form action="./add-goods-php.php" method="POST">
                    <div class="active none">
                        <input class="answer" type="text" name="goodsName" hidden>
                        <input class="answer" type="text" name="goodsIntro" hidden>
                        <input class="answer" type="text" name="goodsLink" hidden>
                        <input class="answer" type="text" name="goodsCost" hidden>
                        <input class="answer" type="text" name="goodsImg" hidden>
                        <input class="answer" type="text" name="card" hidden>
                        <div style="margin: auto; text-align: center;">
                            <p style="font-size: 30px; font-weight: bolder;">
                                確定要上架嗎
                            </p>
                            <button class="submit">送出</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let flows = document.querySelectorAll('.flow');
        let actives = document.querySelectorAll('.active');
        let cards = document.querySelectorAll('.card');
        let radios = document.querySelectorAll('.radio');
        let ins = document.querySelectorAll('.in');
        let submit = document.querySelector('.submit');
        let answers = document.querySelectorAll('.answer');
        
        flows.forEach((a,index)=>{
            actives.forEach((c)=>{
                flows[index].addEventListener('click',()=>{
                    flows.forEach((b)=>{
                        b.classList.add('no');
                    })
                    actives.forEach((d)=>{
                        d.classList.add('none');
                    })
                    flows[index].classList.remove('no');
                    actives[index].classList.remove('none');
                })
            })
        })
        radios.forEach((a,index)=>{
            a.addEventListener('input', (e)=>{
                actives[2].innerHTML = cards[index].outerHTML;
                radios = document.querySelectorAll('.radio');

                radios[radios.length - 1].style.display = "none";
                
                cards = document.querySelectorAll('.card');
                blocks = cards[cards.length - 1].querySelectorAll('.block');
                let image = cards[cards.length - 1].querySelector('.image');
                
                blocks.forEach((b)=>{
                    ins.forEach((c)=>{
                        answers.forEach((answer)=>{
                            flows[3].addEventListener('click',(e)=>{
                            e.preventDefault();
                            const file = ins[ins.length - 1].files[0];
                            const reader = new FileReader();

                            if(answer.name == c.name){
                                // console.log(answer.name);
                                answer.value = c.value;
                                if(answer.name == 'goodsImg'){
                                    reader.addEventListener('load',()=>{
                                        // console.log(1);
                                        answer.value = reader.result
                                    })
                                }
                                if(answer.name == 'goodsLink'){
                                    answer.href = c.value;
                                    // console.log(2);
                                }
                                answers[answers.length - 1].value = radios[index].value;
                            }
                            if(file != undefined){
                                reader.readAsDataURL(file);
                            }else{
                                b.value = '';
                            }
                        })
                        })
                        flows[2].addEventListener('click',(e)=>{
                            e.preventDefault();
                            const file = ins[ins.length - 1].files[0];
                            const reader = new FileReader();

                            if(b.name == c.name){
                                reader.addEventListener('load',()=>{
                                    console.log(1);
                                    image.setAttribute('src', reader.result);
                                })
                                 b.value = c.value;
                                if(b.name == 'goodsLink'){
                                    b.href = c.value;
                                    console.log(b.href);
                                }
                            }
                            if(file != undefined){
                                reader.readAsDataURL(file);
                            }else{
                                image.setAttribute('src', '');
                            }
                        })
                        console.log(ins[ins.length - 1].value);
                    })
                })
            })
        })

    </script>
</body>
</html>