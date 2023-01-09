<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @yield('css')

</head>
<body>

    <!-- nav bar -->
    <nav>
        <a class="logo" href="{{asset('/')}}">
            <img src="{{asset('img/logo.png')}}" alt="">
        </a>
        <a href="{{asset('/news')}}" class="news">news</a>
        <a href="{{asset('/create-news')}}" class="news">news-create</a>
        <div class="text">nav bar</div>
    </nav>

    <main>
        @yield('main')
    </main>

    <!-- footer -->
    <footer>
        footer
    </footer>

    @yield('js')
</body>
</html>
