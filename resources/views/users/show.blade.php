@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
      <h1><strong>{{ $user->username }}</strong> profile</h1>
      <h2>{{ $user->title ? $user->title :  "No title"}}</h2>
      <p>{{ $user->description ? $user->description :  "No description"}}</p>

      <a href="/users/{{ $user->id }}/edit">Edit Profile</a>
      <p><strong>{{ $user->posts->count() }}</strong> posts</p>
      <a href="/posts/create">Add new post</a>
    </div>
    <div class="posts">
      @foreach ($user->posts as $post)
        <a href="#"><img src="/storage/{{ $post->image }}" class="w-100"></a>
      @endforeach
    </div>
</div>
@endsection
