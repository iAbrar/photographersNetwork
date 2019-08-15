<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  // fields can be filled
  protected $fillable = ['body', 'post_id'];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}
