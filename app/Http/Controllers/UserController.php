<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Cloudinary;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('User.index')->with(['own_posts' => $post->getOwnPaginateByLimit()]);
    }
    
}
