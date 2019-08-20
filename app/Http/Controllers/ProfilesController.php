<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
  public function index($username)
  {
      $user = User::where('username', $username)->firstOrFail();

      return view('profiles.show', compact('user'));
  }

  public function edit(User $user)
  {
    return view('profiles.edit', compact('user'));
  }

  public function update(User $user)
  {
    $data = request()->validate([
      'bio' => 'required',
      'url' => 'url',
      'avatar' => 'image',
    ]);
    $is_avaliable= request()->has('is_available');

    if(request('avatar')){
      $imagePath = request('avatar')->store('profile','public');
      // resize the image to be a square
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500); // what is the difference between ' and " in this case?
      $image->save();
    }
    else{
      $imagePath = $user->profile->avatar;
    }
    auth()->user()->profile->update(array_merge(
      $data,
      ['avatar' => $imagePath],
    ['is_available' => $is_avaliable]
    ));

    return redirect("/{$user->username}");

    }
}
