<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
          crossorigin='anonymous'>
    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')
</head>
<body class='p-5'>

<header>
    <nav class='navbar'>
        <a href='/'><img src='/images/logo.png' class='img' id='logo' alt='A(P)A Logo'></a>
        @foreach(config('app.nav') as $link => $label)
            <ul class='navbar-nav'>
                @if(Request::is($link)) {{-- If currrent path matches, do no link --}}
                <li class='nav-item active'>{{$label}}</li>
                @else {{-- Otherwise create link --}}
                <li class='nav-item'><a class='<?= ($label == 'Practice') ? 'nav-link disabled' : 'nav-link'; ?>'
                                        href='/{{ $link }}'>{{ $label }}</a></li>
                @endif
            </ul>
        @endforeach
    </nav>
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>