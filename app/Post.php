<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Post extends Model
{
  use HasStatuses;

  protected $guarded = []; // just until i finish building the app

  protected static function boot()
  {
    parent::boot();

    static::created(function ($post){
      $post->setStatus('pending');
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class);
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
