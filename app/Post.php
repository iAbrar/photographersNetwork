<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $guarded = []; // just until i finish building the app

  protected static function boot()
  {
    parent::boot();

    static::created(function ($post){
      $post->stage()->create();
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function stage()
  {
    return $this->hasOne(Stage::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class)->latest();
  }

  public function addComment($user_id,$body)
  {
    $this->comments()->create(compact('user_id','body'));
  }

}
