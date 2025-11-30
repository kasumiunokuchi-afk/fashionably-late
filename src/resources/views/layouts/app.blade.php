<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
        @php
            $type = $pageType ?? 'default';
        @endphp
        <div class="header__login">
            @if($type === 'register')
            <form action="/login" method="get">
                @csrf
                <button type="submit">login</button>
            </form>
            @elseif($type === 'login')
            <form action="/register" method="get">
                @csrf
                <button type="submit">register</button>
            </form>
            @elseif($type === 'admin')
            @if (Auth::check())
            <form action="/logout" method="post">
                @csrf
                <button type="submit">logout</button>
            </form>
            @endif
            @endif
        </div>
    </header>
    <main>
        <h2 class="title">
            @yield('title')
        </h2>
        @yield('content')
    </main>
</body>

</html>
