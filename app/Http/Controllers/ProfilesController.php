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
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
      return view('profiles.show', compact('user','follows'));
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
      $imagePath = '/storage/'. $imagePath;
    }
    else{
      $imagePath = $user->profile->avatar;
    }

    try {
      auth()->user()->profile->update(array_merge(
        $data,
        ['avatar' =>  $imagePath],
      ['is_available' => $is_avaliable]
      ));
    } catch (\Exception $e) {
      session()->flash('error', 'There was an error');
    }

    session()->flash('success', ' Your profile has been updated!');

    return redirect("/{$user->username}");

    }
}
