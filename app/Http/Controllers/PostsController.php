<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostsController extends Controller
{
//only authenticated user can post in his page

    public function __construct()
    {
      $this->middleware('auth')->except(['timeLine','show']);
    }
    public function timeLine()
    {
      $posts = Post::latest()->get();

      return view('posts.index',compact('posts'));
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
      $image = Image::make(public_path("storage/{$imagePath}"));//->fit(1200,1200); // what is the difference between ' and " in this case?
      $image->save();

try{
      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);
    } catch (\Exception $e) {

         session()->flash('error', 'There was an error');
       }

       session()->flash('success', ' Your image has been uploaded!');
      return redirect()->action(
          'ProfilesController@index', ['username' => auth()->user()->username]
      );
    }

    public function show(Post $post)
    {
      return view('posts.show',compact('post'));
    }

    public function edit(Post $post)
    {

    //  $this->authorize('update', $post);
      return view('posts.edit',compact('post'));
    }

    public function update(Post $post)
    {

      $data = request()->validate([
        'caption' => 'required',
      ]);
      //dd($data['caption']);
      //  $post->caption->update($data); why it doesnt work ?
      //$post->caption-=$data['caption'];
      $post->caption=$data['caption'];
      try {
          $post->save();

      } catch (\Exception $e) {
          session()->flash('error', 'There was an error');
        }

       session()->flash('success', ' Your post has been updated!');
      return redirect("/posts/{$post->id}");

    }

    public function destroy($id)
    {
      //$username = $post->user->username;


      $post = Post::findOrFail($id);
      $username = $post->user->username;


      try {
        $post->delete();

      } catch (\Exception $e) {
          session()->flash('error', 'There was an error');
        }

       session()->flash('success', ' Your post has been deleted!');

      return redirect()->action(
          'ProfilesController@index', ['username' => $username]
      );

    }

}
