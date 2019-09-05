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
if (Request::segment(1) == 'ar' )
{
    app()->setLocale('ar');
    $locale = 'ar';
} else {
    app()->setLocale('en');
    $locale = null;
}
Route::get('/admin', function(){
    return view('admin');
});

Route::prefix($locale)->group(function() {
    Route::get('/', function(){
        return view('welcome');
    })->name('welcome');
    Auth::routes();
    Route::get('/posts/create', 'PostsController@create')->name('post.create');
    Route::get('/posts', 'PostsController@timeLine')->name('post.index');
    Route::get('/posts/{post}', 'PostsController@show')->name('post.show');
    Route::get('/posts/{post}/edit', 'PostsController@edit')->name('post.edit');
    Route::patch('/posts/{post}', 'PostsController@update')->name('post.update');
    Route::delete('/posts/{post}', 'PostsController@destroy')->name('post.destroy');
    Route::post('/posts', 'PostsController@store')->name('posts');

    Route::post('/posts/{post}/comment', 'CommentsController@store')->name('comment.create');

    Route::get('/home', 'HomeController@index')->name('home.index');

    Route::get('/{username}', 'ProfilesController@index')->name('profile.show');
    Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
    Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

    Route::post('/follow/{user}', 'FollowsController@store');

});
