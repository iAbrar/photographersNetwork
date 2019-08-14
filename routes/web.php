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

Route::get('/post/create', 'PostsController@create');

Route::post('/post', 'PostsController@store');

Route::get('/home', 'HomeController@index');

Route::get('/{username}', 'ProfilesController@index')->name('profile.show');
