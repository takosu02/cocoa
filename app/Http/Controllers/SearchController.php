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

class SearchController extends Controller
{
    public function search(Post $post)
    {
        return view('posts.search');
    }
}
