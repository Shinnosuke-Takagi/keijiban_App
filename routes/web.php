<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

// 投稿一覧ページもろもろ
Route::get('/home', 'PostController@index')->name('home');

// 検索のところ
Route::post('/home/search', 'PostController@search')->name('search');

// それぞれの投稿のコメントページもろもろ
Route::get('/posts/{post}/comments','CommentController@index')->name('comments.index');

// カテゴリー別の表示
Route::get('/categories/{category}/posts', 'CategoryController@index')->name('categories.index');

// ログインしてないと見れないところ（操作できないようになってる）
Route::group(['middleware' => 'auth'], function(){

  // コメントを投稿するもろもろ
  Route::get('/posts/{post}/comments/create','CommentController@create')->name('comments.create');
  Route::post('/posts/{post}/comments/create','CommentController@store')->name('comments.store');

  // 投稿関係もろもろ
  Route::resource('posts','PostController')->except(['index']);

  // コメント関係もろもろ
  Route::resource('comments','CommentController')->except(['index','create','store']);
});
