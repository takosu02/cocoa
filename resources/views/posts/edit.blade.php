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
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content_title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class="image">
                    <input type="file" name='image' value="{{$post->image_url}}">
                </div>
                <div class='content_body'>
                    <h2>コーデの説明</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <div class='content_top'>
                    <h2>トップス</h2>
                    <input type='text' name='post[top]' value="{{ $post->top }}">
                </div>
                <div class='content_jacket'>
                    <h2>アウター</h2>
                    <input type='text' name='post[jacket]' value="{{ $post->jacket }}">
                </div>
                <div class='content_pant'>
                    <h2>パンツ</h2>
                    <input type='text' name='post[pant]' value="{{ $post->pant }}">
                </div>
                <div class='content_other'>
                    <h2>アイテム</h2>
                    <input type='text' name='post[other]' value="{{ $post->other }}">
                </div>
                <input type="submit" value="update">
            </form>
            <div class='footer'>
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>