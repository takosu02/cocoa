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
        <h1>user name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>今日のコーデ</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
            </div>
            <div class="body">
                <textarea name="post[body]" placeholder="今日のコーデの説明">{{ old('post.body') }}</textarea>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
                <h2>Item list</h2>
                <table>
                    <thead>
                        <tr>
                            <th>アイテムの説明</th>
                            <th>トップス</th>
                            <th>アウター</th>
                            <th>パンツ</th>
                            <th>アイテム</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>アイテム名</th>
                            <div class="top"><th>
                                <textarea name="post[top]" placeholder="アイテムの説明">{{ old('post.top') }}</textarea>
                            </th></div>
                            <div class="jacket"><th>
                                <textarea name="post[jacket]" placeholder="アイテムの説明">{{ old('post.jacket') }}</textarea>
                            </th></div>
                            <div class="pant"><th>
                                <textarea name="post[pant]" placeholder="アイテムの説明">{{ old('post.pant') }}</textarea>
                            </th></div>
                            <div class="other"><th>
                                <textarea name="post[other]" placeholder="アイテムの説明">{{ old('post.other') }}</textarea>
                            </th></div>
                        </tr>
                    </tbody>
                </table>
            <div>
                <h3>今日のコーデでおすすめするアイテム</h3>
                @foreach($categories as $category)
                <labal>
                    <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                        {{$category->name}}
                    </input>
                </labal>
                @endforeach
            </div>
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
                <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
        </form>
    </body>
    </x-app-layout>
</html>