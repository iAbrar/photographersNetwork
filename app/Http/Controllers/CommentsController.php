<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
  protected $fillable = ['post_id','name','avatar','body'];


    public function store(Post $post)
    {
      //dd('comment');
      if(auth()->user())
      {
        $user_id = auth()->user()->id;
        $name = auth()->user()->username;
      }

      $data = request()->validate([
        'body' => 'required',
      ]);

      try {
        $post->addComment($name,$avatar,request('body'));
        session()->flash('success', ' Your comment has been added!');

      } catch (\Exception $e) {
          session()->flash('error', 'There was an error');
        }


      return back();
    }
}
