<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height: 100%;
            margin: 0px;
            background-color: rgb(182, 182, 182);
        }
        html{
            width: 100%;
            height: 100%;

        }
        .logBox{
            width: 500px;
            height: 700px;
            background-color: white;
            position: absolute;
            top: calc(50% - 350px);
            left: calc(50% - 250px);
            border-radius: 20px;
        }
        .logBox0{
            /* display: none; */
        }
        .logBox1{
            display: none;
        }
        .logBox2{
            display: none;
        }
    </style>
</head>
<body>
    <form action="/log" mathod="POST">
        <div class="logBox logBox0">
            <input type="text" placeholder="account" name="account">
            <button type="button" onclick="button1()">下一步</button>
        </div>
        <div class="logBox logBox1">
            <input type="text" placeholder="password" name="password">
            <button type="button" onclick="button0()">上一步</button>
            <button type="button" onclick="button2()">下一步</button>
        </div>
        <div class="logBox logBox2">
            <input type="text" placeholder="userName" name="userName">
            <button type="button" onclick="button1()">上一步</button>
            <button>送出</button>
        </div>

    </form>
    <script>
        let logBox = document.querySelectorAll('.logBox');
        function button0() {
            logBox.forEach(function (value,index) {
                value.style = "display:none";
            })
            logBox[0].style = 'display:block';
        }
        function button1() {
            logBox.forEach(function (value,index) {
                value.style = "display:none";
            })
            logBox[1].style = 'display:block';
        }
        function button2() {
            logBox.forEach(function (value,index) {
                value.style = "display:none";
            })
            logBox[2].style = 'display:block';
        }
    </script>
</body>
</html>