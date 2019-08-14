<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
//only authenticated user can post in his page

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {

      $data = request()->validate([
        'caption' => 'required',
        'image' => ['required', 'image'] ,
      ]);

      $imagePath = request('image')->store('uploads','public');

      // resize the image to be a square
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(900,900); // what is the difference between ' and " in this case?
      $image->save();


      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);

      return redirect()->action(
          'ProfilesController@index', ['username' => auth()->user()->username]
      );
    }

    public function show(\App\Post $post)
    {
      return view('posts.show',compact('post'));
    }
}
