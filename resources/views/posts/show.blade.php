@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Creator : {{ $post->user->username }}</h1>
  <h2>Caption : {{ $post->caption }}</h2>
  <img src="/storage/{{ $post->image }}" alt="">
</div>
@endsection
