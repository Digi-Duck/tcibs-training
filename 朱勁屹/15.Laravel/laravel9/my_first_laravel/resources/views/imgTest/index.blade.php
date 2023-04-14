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
            background-color: rgb(179, 179, 179);
        }
        main{
            width: 80%;
            display: block;
            margin: auto;
            border: 5px solid black;
            border-radius: 5px;
            margin-top: 100px;
        }
        .top{
            background-color: black;
            font-size: 50px;
            color: white;
            text-align: center;
        }
        img{
            width: 200px;
            height: 200px;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <main>
        <div class="top">
            Amongus
        </div>
    </main>
    <img src="{{asset('img/img1.png')}}" alt="">
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="file">
    </form>
</body>
</html>
