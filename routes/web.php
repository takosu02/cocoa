<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
    return view('posts.create');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::get('/posts/{post}/comment', 'comment')->name('comment');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::controller(CommentController::class)->middleware(['auth'])->group(function(){
    Route::post('/comments', 'store');
    Route::delete('/comments/{comment}', 'delete');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/user', 'index')->name('index');
    Route::get('/user', 'store')->name('store');
    Route::post('/users', 'store')->name('store');
    Route::get('/users/{user}', 'usershow')->name('usershow');
});

Route::controller(MypageController::class)->middleware(['auth'])->group(function(){
    Route::get('/mypage', 'mypage')->name('mypage');
    Route::get('/mypage/mypagecreate', 'create')->name('mypagecreate');
});

Route::controller(SearchController::class)->middleware(['auth'])->group(function(){
   Route::get('/search', 'search')->name('search'); 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';