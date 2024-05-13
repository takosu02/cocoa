<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mypage;
use App\Models\Search;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class Search_resultController extends Controller
{
    public function search_results(Request $request, Post $post, Category $category)
    {
        // フォームから送信されたカテゴリーのIDを取得
        $categoryIds = $request->input('categories_array');
        //取得したIDを$selectedに入れる
        $selectedCategories = Category::whereIn('id', $categoryIds)->get();
        // カテゴリーが選択されている場合
        if (!empty($categoryIds)) {
            // 選択されたカテゴリーに関連する投稿を検索
            $posts = Post::whereHas('categories', function($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
            })->get();
        } else {
            // カテゴリーが選択されていない場合は全ての投稿を取得
            $posts = Post::all();
        }
        // 検索結果をビューに渡して表示
        return view('posts.search_results', ['posts' => $posts, 'selectedCategories' => $selectedCategories]);
    }
}
