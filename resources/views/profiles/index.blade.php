@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
      <h1><strong>{{ $user->username }}</strong> profile</h1>
      <h2>{{ $user->profile->title }}</h2>
      <p>{{ $user->profile->description }}</p>
      <a href="#">Add new post</a>
    </div>
</div>
@endsection
