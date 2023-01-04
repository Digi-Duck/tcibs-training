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
        nav bar
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
