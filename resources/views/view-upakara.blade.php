
@extends ('layout')
<style type="text/css">
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>

@section ('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>{{$upakara->name}}</h1>
      <img src="{{asset('uploads/'.$upakara->origin_image)}}" class="bd-placeholder-img card-img-top">  
      <br>
      <p class="lead text-muted">{{$upakara->description}}.</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </div>

</main>
@php
  $pembeli = Session::get('pembeli');
@endphp
<input type="hidden" id="data_pembeli" value="{{ isset($pembeli) ? $pembeli->id : ''}}"> 
 
@stop

@section('otherscript')
  
@stop
