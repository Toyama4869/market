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

//商品関連
Route::resource('posts', 'PostController');

// Route::patch('/posts/{id}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit_image', 'PostController@editImage')->name('posts.edit_image');
Route::patch('/posts/{post}/edit_image', 'PostController@updateImage')->name('posts.update_image');
Route::patch('/posts/{post}/toggle_like', 'PostController@toggleLike')->name('posts.toggle_like');
Route::get('/posts/{post}/confirm', 'PostController@confirm')->name('posts.confirm');
Route::get('/posts/{post}/finish', 'PostController@finish')->name('posts.finish');

Route::get('/', 'PostController@index')->name('top');;
//検索機能
Route::get('/find','PostController@find')->name('posts.find');
Route::post('/find','PostController@search')->name('posts.find');




//お気に入り登録
//お気に入りの追加処理: store
//お気に入りの削除処理: destroy
Route::resource('likes', 'LikeController')->only([
  'index', 'store', 'destroy'
]);

//注文処理
Route::patch('/posts/{post}/toggle_order', 'PostController@toggleOrder')->name('posts.toggle_order');


//followに関するルート
Route::resource('follows', 'FollowController')->only([
  'index', 'store', 'destroy'
]);

Route::get('/follower', 'FollowController@followerIndex');

Auth::routes();

Route::resource('comments', 'CommentController')->only([
  'store', 'destroy'
]);



Route::get('/users/edit', 'UserController@edit')->name('users.edit');
Route::patch('/users', 'UserController@update')->name('users.update');
Route::get('/users/edit_image', 'UserController@editImage')->name('users.edit_image');
Route::patch('/users/edit_image', 'UserController@updateImage')->name('users.update_image');

Route::resource('users', 'UserController')->only([
  'show','exhibitions',
]);



Route::get('users/{users}/exhibitions', 'UserController@exhibitions')->name('users.exhibitions');

