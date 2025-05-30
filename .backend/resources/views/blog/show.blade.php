@extends('layouts.top')

@section('content')

@if (today()->is('12-25'))
    <h1>メリークリスマス！</h1>
@endif

<h1>{{ $blog->title }}</h1>

<div>{!! nl2br(e($blog->body)) !!}</div>

<p>書き手：{{ $blog->user->name }}</p>
<p>ステータス：{{ $blog->status }}</p>

<h2>コメント</h2>
@foreach ($blog->comments()->oldest()->get() as $comment)
    <hr>
    <p>{{ $comment->name }} {{ $comment->created_at }}</p>
    <p>{!! nl2br(e($comment->body)) !!}</p>
@endforeach


@endsection