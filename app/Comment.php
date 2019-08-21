<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  // fields can be filled
  protected $fillable = ['body', 'user_id','post_id','name','avatar'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}
