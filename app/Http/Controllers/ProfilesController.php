<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfilesController extends Controller
{
  public function show(Profile $profile)
  {
    return view('profiles.show', [
      'profile' => $profile,
    ]);
  }

  public function edit(User $user)
  {

    //$this->authorize('update',$user->profile);

    return view('profiles.edit', [
      'user'=>$user->loadMissing('profile'),
    ]);
  }

  public function update(Profile $profile)
  {
    $data = request()->validate([
      'title'=>['string','max:100'],
      'description'=>['string','max:255'],
    ]);

    auth()->user()->profile->update($data);

    return redirect("/users/{$user->id}");
  }
}
