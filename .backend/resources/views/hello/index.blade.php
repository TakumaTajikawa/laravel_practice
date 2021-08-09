<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Index</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{ $msg }}</p>
    <ol>
        @foreach($data as $item)
            <li>
                {{ $item->name }}
                [{{ $item->email }}, {{ $item->age }}]
            </li>
        @endforeach
    </ol>
    <hr>
    {!! $data->links() !!}
</body>
</html>