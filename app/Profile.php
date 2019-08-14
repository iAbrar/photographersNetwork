<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = []; // just until i finish building the app

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function cameras()
    {
      return $this->hasMany(Camera::class);
    }

    public function specialties()
    {
      return $this->hasMany(Specialty::class);
    }
}
