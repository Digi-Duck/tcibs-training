<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @guest->判斷是否登入
        @guest
        未登入
        @else
        已登入
        @endguest
        --}}
        {{-- 
            composer require laravel/ui->不重要
            php artisan ui bootstrap --auth
            auth->建立會員系統
            npm install->js套件
            npm run dev
            --}}
    <form action="{{asset('/inDB')}}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="text" name="thing">
        <input type="text" name="number">
        <button type="submit">123</button>
    </form>
</body>
</html>