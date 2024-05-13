<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Search result</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        @csrf
        <div>
            <h2>検索結果</h2>
            <p>選択したカテゴリ:</p><ul>
            @foreach($selectedCategories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
            </ul><br>
            @foreach($posts as $post)
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
            @endforeach
        </div>
    </body>
    </x-app-layout>
</html>