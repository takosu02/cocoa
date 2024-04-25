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
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    </div>
                    <p class='body'>{{ $post->body }}</p>
                    <h3 class='top'>トップス：{{ $post->top }}</h3>
                    <h3 class='jacket'>アウター：{{ $post->jacket }}</h3>
                    <h3 class='pant'>パンツ：{{ $post->pant }}</h3>
                    <h3 class='other'>アイテム：{{ $post->other }}</h3>
                    {{--カテゴリーの表示--}}
                    <h5 class='category'>
                        <h3>おすすめするアイテム</h3>
                        @foreach($post->categories as $category)
                        {{ $category->name }}
                        @endforeach
                    </h5>
                </div>
                <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a>
                @if ($auth_id == $post->user->id)
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
                @endif
                <br><br>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
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