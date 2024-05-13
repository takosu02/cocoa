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

//検索ページの表示
class SearchController extends Controller
{
    public function search(Category $categories)
    {
        return view('posts.search')->with(['categories' => $categories->get()]);
    }
    
}
