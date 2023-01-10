<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- 
        資料夾.資料
        --}}
</head>
<body>
    @foreach ($news as $i)

    {{-- b:foreach --}}
        {{$i->title}}
        @php
            //bphp
        @endphp
    @endforeach
</body>
</html>