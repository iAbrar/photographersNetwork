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
        $avatar = auth()->user()->profile->avatar;
      }

      else{
        $user_id = 0;
        $name = 'anonymous';
        $avatar = '/images/profile.png';
      }
      $data = request()->validate([
        'body' => 'required',
      ]);

      try {
        $post->addComment($user_id,$name,$avatar,request('body'));

      } catch (\Exception $e) {
          session()->flash('error', 'There was an error');
        }

       session()->flash('success', ' Your comment has been added!');
       
      return back();
    }
}
