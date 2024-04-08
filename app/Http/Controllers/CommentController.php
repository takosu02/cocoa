<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        //$input = ['comment' => $request->input('comment')];
        //$input += ['user_id' => $request->user()->id];
        // ログインしているユーザーのIDを取得する
        $userId = Auth::id();
    
        // コメント内容とユーザーIDを組み合わせて配列として受け取る
        $input = [
            'comment' => $request->input('comment'),
            'user_id' => $userId,
            'post_id' => $request['post_id'],
        ];
        $comment->fill($input)->save();
        return redirect('/posts/' . $input['post_id']);
    }
    
    public function delete(Request $request, Comment $comment)
    {
        $input = [
            'comment' => $request['comment']
        ];
        $comment->delete();
        return redirect()->back();
    }
}