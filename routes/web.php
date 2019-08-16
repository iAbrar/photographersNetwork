<?php

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

Route::get('/posts/create', 'PostsController@create');
Route::get('/posts', 'PostsController@timeLine');
Route::get('/posts/{post}', 'PostsController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'PostsController@update')->name('post.update');
Route::post('/posts', 'PostsController@store');

Route::post('/posts/{post}/comment', 'CommentsController@store');

Route::get('/home', 'HomeController@index');

Route::get('/{username}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
