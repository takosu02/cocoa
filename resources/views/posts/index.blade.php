<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <h1>Website Name</h1>
        <div class='posts'>
            <a href='/posts/create'>create</a><br><br>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <h3>トップス</h3>
                    <p class='top'>{{ $post->top }}</p>
                    <h3>アウター</h3>
                    <p class='jacket'>{{ $post->jecket }}</p>
                    <h3>パンツ</h3>
                    <p class='pant'>{{ $post->pant }}</p>
                    <h3>アイテム</h3>
                    <p class='other'>{{ $post->other }}</p>
                    {{--カテゴリーの表示--}}
                    <h5 class='category'>
                        @foreach($post->categories as $category)
                        {{ $post->name}}
                        @endforeach
                    </h5>
                </div>
                <div>{{ Auth::user()->name }}</div>
                <br><br>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    </x-app-layout>
</html>