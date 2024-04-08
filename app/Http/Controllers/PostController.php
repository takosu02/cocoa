<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $id=Auth::id();
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(5)])->with(['post' => $post, 'auth_id' => $id]);
    }
    
    public function show(Post $post)
    {
        $id=Auth::id();
        return view('posts.show')->with(['post' => $post, 'auth_id' => $id]);
    }
    
    public function create(Category $categories)
    {
        return view('posts.create')->with(['categories' => $categories->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input_categories = $request->categories_array; //create.bladeのcategories_array[]
        $input += ['image_url' => $image_url];
        $post->fill($input)->save();
        $post->categories()->attach($input_categories);
        return redirect('/');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $input_post += ['image_url' => $image_url];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function comment(Post $post)
    {
        return view('posts.comment')->with(['post' => $post]);
    }
    
}
