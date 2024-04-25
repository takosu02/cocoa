<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <form action="/users" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <h2>自己紹介</h2>
            <div class="image">
                <input type="file" name="image">
            </div>
                <textarea name="body" placeholder="例：東京に住んでいる大学生です！">{{ old('user.body') }}</textarea>
            </div>
            <div class="age">
                年齢を入力(任意):<input type="tel" name="age" maxlength="2"/>歳
            </div>
            <div class="height">
                身長を入力(任意):<input type="tel" name="height" maxlength="3"/>cm
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="body">
            <p class="body_error" style="color:red">{{ $errors->first('user.body') }}</p>
        </div>
        <div class='footer'>
            <a href="/mypage">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>