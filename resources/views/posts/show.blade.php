<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <div class='content'>
            <h1 class='content_post'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h1>
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
                <p class='body'>{{ $post->body }}</p>
                <h3 class='top'>トップス：{{ $post->top }}</h3>
                <h3 class='jacket'>アウター：{{ $post->jacket }}</h3>
                <h3 class='pant'>パンツ：{{ $post->pant }}</h3>
                <h3 class='other'>アイテム：{{ $post->other }}</h3>
            </div>
            {{--カテゴリーの表示--}}
            <h5 class='category'>
                <h3>おすすめするアイテム</h3>
                @foreach($post->categories as $category)
                    {{ $category->name }}
                @endforeach
            </h5>
        </div>
        <div class='comment'><a href="/posts/{{ $post->id }}/comment">comment</a></div>
        @if ($auth_id == $post->user->id)
        <div class='edit'><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
            </form>
        @endif
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        ---------------コメントを表示---------------
        @foreach($post->comments as $comment)
            <p class='user'>{{ $comment->user->name }}</p>
            <p class='comment'>{{ $comment->comment }}</p>
            @if ($auth_id == $comment->user->id)
            <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $comment->id }})">delete</button>
            </form>
            @endif
            <br>
        @endforeach
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
    </x-app-layout>
</html>