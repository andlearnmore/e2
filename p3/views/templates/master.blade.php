<!doctype html>
<html lang='en'>
<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='icon' href='/images/favicon.ico' type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    <link href='/css/kuchen.css' rel='stylesheet'>
    
    <link href='/css/app.css' rel='stylesheet'>
    @yield('head')

</head>
<body>
    <div class='container'>
    <header class='d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom'>
        <nav class='navbar'>
            <div class='container'>
                <a class='navbar-brand' href='/'>
                <img src='/images/logo.svg' alt='The Blue Cake Logo' width='30' height='24'>
                </a>

                {{-- TODO: INSERT LINKS TO PAGES AFTER I CREATE THEM. --}}
                <ul class='nav nav-pills'>
                    @yield('nav1')<li class='nav-item'><a href='/' class='nav-link'>Play</a></li>
                    @yield('nav3')<li class='nav-item'><a href='/all-nouns' class='nav-link'>Noun List</a></li>
                    @yield('nav4')<li class='nav-item'><a href='/games' class='nav-link'>Game History</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    </div>
@yield('body')

</body>
</html>