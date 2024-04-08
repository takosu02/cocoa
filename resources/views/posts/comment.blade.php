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
                        @foreach($post->categories as $category)
                        {{ $category->name}}
                        @endforeach
                    </h5>
        </div>
        <h3>コメントの作成</h3>
        <div class="comment">
            <form action="/comments" method="POST">
                @csrf
                <div class='content_comment'>
                    <!-- post_id を隠しフィールドとして追加 -->
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name='comment' placeholder="コメントを書いてください">{{ old('comment.comment') }}</textarea>
                </div>
                <input type="submit" value="store">
            </form>
        </div>
        <div class='footer'>
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>