<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $guarded = []; // just until i finish building the app

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function addComment($body)
  {
//dd($body);
    $this->comments()->create(compact('body'));
  }

}
