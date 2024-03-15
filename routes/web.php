<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    return view('posts.create');
});

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);

//メール確認機能(?)
/*Route::middleware('verified')->group(function() {
    Route::group(['middleware' => 'auth:user'], function () {
        //メール認証済みかつログイン済みのユーザーが見れる画面
        Route::get('/home', 'HomeController@index')->name('home');
    });
});
*/