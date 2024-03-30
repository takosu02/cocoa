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
        <h1 class="title">
            {{ $post->title }} 
        </h1>
        <div class='posts'>
                    <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <h3>トップス</h3>
                    <p class='top'>{{ $post->top }}</p>
                    </div>
                    {{--カテゴリーの表示--}}
                    <h5 class='category'>
                        @foreach($post->categories as $category)
                        {{ $post->name}}
                        @endforeach
                    </h5>
        </div>
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        {{--<div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>--}}
    </body>
    </x-app-layout>
</html>