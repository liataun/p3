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
    <a href='/'><img src='/images/notfound.png' id='logo' alt='Not Found Logo'></a>
    <nav>
        @foreach(config('app.nav') as $link => $label)
            <ul>
                {{-- If currrent path matches, do no link --}}
                @if(Request::is($link))
                    {{$label}}
                    {{-- Otherwise create link --}}
                @else
                    <a href='{{ $link }}'>{{ $label }}</a>
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