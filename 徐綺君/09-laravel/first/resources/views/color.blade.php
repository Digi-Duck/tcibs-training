<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            margin: 0px;
        }
        .title{
            font-size: 60px;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .wrapper{
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            background-color: rgba(140, 156, 163, 0.5);
            z-index: 1;
        }
        .star{
            position: absolute;
            top: calc(50% - 50px);
            left: calc(50% - 100px);
            width: 200px;
            height: 100px;
            font-size: 40px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            z-index: 1;
        }
        .star:hover{
            background-color: aliceblue;
        }
        .timeBox{
            position: absolute;
            top: 200px;
            left: 100px;             
            font-size: 60px;
            margin: 0px 40px;
        }
        .score{
            font-size: 60px;
            position: absolute;
            top: 200px;
            right: 200px;
        }

        .content{
            border: 1px solid black;
            border-radius: 10px;
            width: 800px;
            height: 800px;
            display: flex;
            flex-direction: column;
            margin: 0px auto;
            padding: 2.5px;
        }
        .box_column{
            width: 100%;
            height: 100%;
            display: flex;
            margin: 2.5px 0px;
        }
        .box_row{
            width: 100%;
            height: 100%;
            margin: 0px 2.5px;
            border-radius: 10px;        
            background-color: aqua; 
        }
        .btn{
            opacity: 1;
        }

    </style>
</head>
<body>
    <div class="title">色弱遊戲</div>
    <div class="wrapper">
        <button class="star">開始</button>
    </div>
    <div class="timeBox">Time : 60s</div>    
    <div class="score">分數:0</div>
    <div class="main">
        <div class="content">
        </div>
    </div>

    <script>
        const starbox = document.querySelector('.wrapper');
        const star =  document.querySelector('.star');
        const content = document.querySelector('.content');
        const timeBox = document.querySelector('.timeBox');
        const scoreBox = document.querySelector('.score');
        let score = 0;
        let click_num = 1;
        let a = [];
        let time = 60;
        let opacity = 0.1;

        star.addEventListener('click',function(){
            starbox.style = "display:none"
            setInterval(function() {
                time--;
                if (time == -1) {
                    alert('時間到了! 分數:' + score);
                    location.reload();
                }
                timeBox.innerHTML = "Time : "+time+"s"
            }, 1000);
        });
        
        window.onload = addbox();




        function addbox(){
            content.innerHTML = ' ';
            click_num ++;
            if (click_num >= 7) {
                click_num = 7;
            };
            let num = Math.floor(Math.random() *click_num *click_num);


            for (let i = 0; i < click_num; i++) {

                content.innerHTML += '<div class="box_column"></div>';
            };
            let box_column = document.querySelectorAll('.box_column');  
            box_column.forEach(function (box_column){
                for (let j = 0; j < click_num; j++) {
                    box_column.innerHTML += '<div class="box_row"></div>';
                }      
            }); 

            let box = document.querySelectorAll('.box_row');
            let r = Math.floor(Math.random() * 256);
            let g = Math.floor(Math.random() * 256);
            let b = Math.floor(Math.random() * 256);
            
            box.forEach(function (box) {
                let i = 0;
                i++;
                a[i] = box;
                box.style = "background-color: rgb("+ r +","+ g +","+ b +")" ;

            });

            box[num].classList.add('btn');
            let btn = box[num];

            if (opacity >= 0.85) {
                opacity = 0.85;
            }
            btn.style = "background-color: rgb("+ r +","+ g +","+ b +") ;opacity: "+opacity+";"
            console.log(btn);
            box.forEach(box => {
                box.addEventListener('click',function(){
                    addbox();
                });                
            });

            btn.addEventListener('click',function(){
                opacity = opacity*1.15;
                score = score + 1;
                scoreBox.innerHTML = "分數:"+score;
            });

        }

        

    </script>
</body>
</html>