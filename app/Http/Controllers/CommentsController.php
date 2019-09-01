<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
  protected $fillable = ['user_id','post_id','body'];


    public function store(Post $post)
    {
      //dd('comment');
      if(auth()->user())
      {
        $user_id = auth()->user()->id;
      }
else {
  $user_id = null;
}

      $data = request()->validate([
        'body' => 'required',
      ]);

//dd($user_id,request('body'));
    //  try {
        $post->addComment($user_id,request('body'));

    //  } catch (\Exception $e) {
      //    session()->flash('error', 'There was an error');
      //  }

    //   session()->flash('success', ' Your comment has been added!');

      return back();
    }
}
