@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row">
      <h1>Edit Profile</h1>
    </div>

    <div class="row">
        <label for="title" class="col-md-4 col-form-label">Profile Title</label>

            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->title ? $user->title :  ""}}" autocomplete="title" autofocus>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="row">
        <label for="description" class="col-md-4 col-form-label">Profile Description</label>

            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->description ? $user->description :  ""}}" autocomplete="description" autofocus>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="row pt-3">
      <button class="btn btn-primary">Save Profile</button>
    </div>

  </form>
</div>
@endsection
