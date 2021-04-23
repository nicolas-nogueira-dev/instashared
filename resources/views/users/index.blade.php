@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
      @foreach ($users as $user)
        <div class="">
          <h2>User : {{$user->username}}</h2>
          <p>Title : {{$user->title}}</p>
          <p>Description : {{$user->description}}</p>
          <a href="../users/{{$user->id}}">See this user</a>
        </div>
      @endforeach
    </div>
</div>
@endsection
