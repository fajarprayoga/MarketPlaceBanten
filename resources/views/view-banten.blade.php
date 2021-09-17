
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
      <h1>{{$banten->name}}</h1>
      <div align="right" style="padding-bottom: 10px;">
        <button type="button" class="btn btn-primary order_banten" data-banten="{{$banten->id}}">Order</button>
      </div>
      
      <img src="{{asset('uploads/'.$banten->origin_image)}}" class="bd-placeholder-img card-img-top">  
      <br>
      <p class="lead text-muted">{{$banten->description}}.</p>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.order_banten',function(){
        //cek sudah login apa belum
        var dat_pembeli = $('#data_pembeli').val();
        if(dat_pembeli == '') {
          $.alert({
              title: 'Pemberitahuan !',
              content: 'Silahkan login terlebih dahulu !',
          });
        }else{ 
          var banten_id = $(this).attr('data-banten');
          window.location = "{{route('fe.order') }}"+"/"+banten_id;
        }
        
      });
    });
  </script>
@stop
