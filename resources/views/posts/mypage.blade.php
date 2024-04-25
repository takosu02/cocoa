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
        <div class='mypage'>
            <h1>Mypage</h1>
            <div class='user'>
                <h2 class='name'>
                    <a>{{ $user->name }}</a>
                </h2>
                <div>
                    <img src="{{ $user->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <h2 class='body'>
                    <a>{{ $user->body }}</a>
                </h2>
                <h2 class='age'>
                    <a>年齢:{{ $user->age }}</a>
                </h2>
                <h2 class='height'>
                    <a>身長:{{ $user->height }}</a>
                </h2>
            </div>
            <a href='/mypage/mypagecreate'>create</a><br>
        </div>
        <br>
        <h2>過去の投稿</h2>
        @foreach($posts as $post)
            {{--@if($user_id == $post->user->id)--}}
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
                    
                <div>{{ $post->user->name }}</div>
                </div><br>
            {{--@endif--}}
        @endforeach
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    </x-app-layout>
</html>