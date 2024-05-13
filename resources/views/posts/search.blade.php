<!DOCTYPE html>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
        <form action="/search_results" method="GET" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>カテゴリで検索</h2>
                @foreach($categories as $category)
                    <input type="checkbox" value="{{ $category->id }}" name="categories_array[]">
                        {{$category->name}}
                    </input>
                @endforeach
            </div>
            <input type="submit" value="検索"/>
        </form>
    </body>
    </x-app-layout>
</html>