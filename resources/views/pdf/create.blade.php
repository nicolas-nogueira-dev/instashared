@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/posts" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <h1>Add New Pdf</h1>
    </div>

    <div class="row">
        <label for="pdf" class="col-md-4 col-form-label">Post Pdf</label>

            <input id="pdf" type="file" class="form-control-file" name="pdf">

            @error('pdf')
              <strong>{{ $message }}</strong>
            @enderror
    </div>

    <div class="row pt-3">
      <button class="btn btn-primary">Add New Pdf</button>
    </div>

  </form>
</div>
@endsection
