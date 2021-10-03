<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Index</title>
</head>
<body>

    <nav>
        <li><a href="/">TOP（ブログ一覧）</a></li>
        @auth
            <li><a href="/maypage/blogs/">マイブログ一覧</a></li>
            <li>
                <form method="post" action="/mypage/logout">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">ログイン</a></li>
        @endauth
    </nav>


    @yield('content')
</body>
</html>