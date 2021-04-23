@extends('layouts.app')

@section('content')
  @foreach ($users as $user)
    @foreach ($user->posts as $post)
      <div class="" style="display:flex;flex-flow:column;align-items:center;">
        <h2>Caption : {{$post->caption}}</h2>
        <a href="../posts/{{$post->id}}"><img src="/storage/{{ $post->image }}" class="w-100" style="max-width:1000px;"></a>
      </div>
    @endforeach
  @endforeach
@endsection
