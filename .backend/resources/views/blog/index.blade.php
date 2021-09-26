@extends('layouts.top')

@section('content')

<h1>ブログ一覧</h1>

<ul>
    @foreach ($blogs as $blog)
        <li>
            {{ $loop->iteration }}：
            <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                {{ $blog->title }}  
            </a>
            {{ $blog->user->name }} 
            ({{ $blog->comments_count }}件のコメント)
        </li>
    @endforeach
</ul>

@endsection
