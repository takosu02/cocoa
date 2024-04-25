<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mypage;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage(Request $request, Post $post)
    {
        $user_id=Auth::id();
        
        $user = User::findOrFail($user_id);
        $posts = $post->where('user_id', $user_id)
               ->orderBy('created_at', 'desc')
               ->paginate(5);
        
        return view('posts.mypage', compact('user', 'posts'))->with(['auth_id' => $user_id]);
        //return view('posts.mypage')->with(['posts' => $post->getPaginateByLimit(5)]);//whereで絞り込む
    }
    
    public function create(Mypage $mypage)
    {
        return view('posts.mypagecreate');
    }
    
    public function store(Request $request, Mypage $mypage)
    {
        // ログインしているユーザーのIDを取得する
        $userId = Auth::id();
        $input = [
            'user_id' => $userId,
            'post_id' => $request['post_id'],
            ];
        $mypage->fill($input)->save();
        return redirect('/mypage');
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/mypage');
    }
}
