<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      $data = request()->validate([
        'caption' => ['required', 'string', 'max:255'],
        'image' => ['required', 'image'],
      ]);

      $imagePath = request('image')->store('uploads','public');

      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);

      return redirect('/users/'.auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
      return view('posts.show', [
        'post'=>$post,
      ]);
    }
}
