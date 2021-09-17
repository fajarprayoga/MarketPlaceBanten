
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
      <h1>upakara</h1>
      <p class="lead text-muted">upakara merupakan sesajen atau sarana persembahyangan yang digunakan oleh masyarakat hindu di Bali dan masyarakat hindu yang di luar daerah Bali. upakara yang digunakan atau sesajen yang dipersembahkan beragam jenisnya baik dalam jenis upakara yang dilakukan, dari persembahyangan dilakukan sehari-hari maupun persembahyangan pada hari raya tertentu.</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
@if(isset($upakaras))
  @foreach($upakaras as $upakara)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <img src="{{asset('uploads/'.$upakara->origin_image)}}" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <div class="card-body">
              <p class="card-text" style="height: 120px;">{{substr($upakara->description,0,200).' ... '}} 
                @if(strlen($upakara->description) > 200)
                <a href="{{route('fe.viewupakara',[$upakara->id])}}"><small>Selengkapnya</small></a>
                @endif
              </p>
              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('fe.viewupakara',[$upakara->id])}}" class="btn btn-sm btn-outline-secondary">View</a>
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary order_upakara" data-upakara="{{$upakara->id}}">Order</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
          </div>
        </div>
  @endforeach
@endif
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
      $(document).on('click','.order_upakara',function(){
        //cek sudah login apa belum
        var dat_pembeli = $('#data_pembeli').val();
        if(dat_pembeli == '') {
          $.alert({
              title: 'Pemberitahuan !',
              content: 'Silahkan login terlebih dahulu !',
          });
        }else{ 
          var upakara_id = $(this).attr('data-upakara');
          window.location = "{{route('fe.order') }}"+"/"+upakara_id;
        }
        
      });
    });
  </script>
@stop
