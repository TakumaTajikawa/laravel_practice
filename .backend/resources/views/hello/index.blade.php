<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Index</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{ $msg }}</p>
    <ol>
        @foreach($data as $item)
            <li>
                {{ $item->id}}
                {{-- {{ $item->name_and_age }} --}}
                {{-- [{{ $item->email }},  --}}
                {{ $item->name_and_mail }}]
            </li>
        @endforeach
    </ol>
    <hr>
    <form action="/hello" method="POST">
        @csrf
        ID:<input type="text" id="id" name="id">
        <input type="submit" value="送信">
    </form>
</body>
</html>