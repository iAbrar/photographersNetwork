<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Comment extends Model
{
  use HasStatuses;
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
