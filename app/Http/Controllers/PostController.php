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
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Category $categories)
    {
        return view('posts.create')->with(['categories' => $categories->get()]);
        return view('posts.show')->with(['categories' => $categories]);
        return view('/posts/create');
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
        //return redirect('/posts/' . $post->id);
        dd($image_url);  //画像のURLを画面に表示
        //return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    
}
