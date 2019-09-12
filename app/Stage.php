<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  protected static function boot()
  {
    parent::boot();

    static::created(function ($user){
      $user->stage()->create();
    });
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
