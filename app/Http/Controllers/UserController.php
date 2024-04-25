<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Mypage;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('User.index')->with(['own_posts' => $post->getOwnPaginateByLimit()]);
    }
    
    public function mypage(User $user)
    {
        return view('User.mypage');
    }
    
    public function store(Request $request)
    {
    $user = Auth::user();

    // 特定の情報を更新
    $user->body = $request->input('body'); 
    $user->age = $request->input('age');
    $user->height = $request->input('height');
    $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    $user->image_url = $image_url;

    // 変更を保存
    $user->save();

    return redirect('/mypage');
    }
    
    public function usershow(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.usershow', compact('user', 'posts'));
    }
}
