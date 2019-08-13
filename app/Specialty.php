<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
  public function profile()
  {
    return $this->belongsTo(Profile::class);
  }
}
