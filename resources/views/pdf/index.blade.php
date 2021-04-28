@extends('layouts.app')

@section('content')
<div class="container">
  <div class="">
    <a class="" href="/pdfs/create">
        Import pdf
    </a>
  </div>
  <div class="">
      @foreach ($pdfs as $pdf)
        <div class="">
          <h2>Pdf id : {{$pdf->id}}</h2>
          <p>Pdf path : {{$pdf->path}}</p>

        </div>
      @endforeach
  </div>
</div>
@endsection
