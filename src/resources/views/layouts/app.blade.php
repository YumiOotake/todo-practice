<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todos</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__utilities">
                <a href="/" class="header__logo">Todos</a>
            </div>

            <form action="/logout" method="post" class="header__form">
                @csrf
                <button type="submit" class="header__form-button">ログアウト</button>
            </form>

        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
