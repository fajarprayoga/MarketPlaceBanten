
@extends ('layout')
<style type="text/css">
    .carousel {
    height: 500px;
    margin-bottom: 60px;
}
/* Since positioning the image, we need to help out the caption */
 .carousel-caption {
    z-index: 10;
}
/* Declare heights because of positioning of img element */
 .carousel .item {
    width: 100%;
    height: 500px;
    background-color: #777;
}
.carousel-inner > .item > img {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    height: 500px;
}
@media (min-width: 768px) {
    .carousel-caption p {
        margin-bottom: 20px;
        font-size: 21px;
        line-height: 1.4;
    }
}
img {
    background: red;
}
</style>
@section ('content')
    <div class="container banten">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
        @if(isset($benners))
            @php $i = 1; @endphp
            @foreach($benners as $benner)
            <div class="carousel-item {{$i == 1 ? 'active' : '' }}">
              <img src="{{asset('uploads/'.$benner->image)}}" class="d-block w-100" alt="{{$benner->title}}" style="height: 100%;">
            </div>
            @php $i += 1; @endphp
            @endforeach
        @endif
          </div>
            
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

    
    <!-- <div class="container listupakara">
        <div class="row">
            <div class="col-sm-12">
                <h2>Upakara - upakara :</h2> 
            </div>
        </div>
        <div class="row">
    @if(isset($upakaras))
        @foreach($upakaras as $upakara)
        <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$upakara->name}}</h5>
            <p class="card-text">{{$upakara->description}}</p>
            <a href="#" class="btn btn-primary">Detail</a>
          </div>
        </div>
      </div>
        @endforeach
    @endif
    </div> -->
    <!-- <br>
    <button type="button" class="btn btn-primary btn-lg">Lihat lebih...</button> -->
    
    <div class="container listbanten">
        <div class="row">
            <div class="col-sm-12">
                <h2>Banten :</h2> 
            </div>
        </div>
        <div class="row">
    @if($bantens)
        @foreach($bantens as $banten)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                <img src="{{asset('uploads/'.$banten->origin_image)}}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text" style="height: 120px;">{{substr($banten->description,0,200).' ... '}} 
                    @if(strlen($banten->description) > 200)
                    <a href="{{route('fe.viewbanten',[$banten->id])}}"><small>Selengkapnya</small></a>
                    @endif
                  </p>
                  <p class="card-text">Rp. {{number_format($banten->harga,2)}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{route('fe.viewbanten',[$banten->id])}}" class="btn btn-sm btn-outline-secondary">View</a>
                      <button type="button" class="btn btn-sm btn-outline-secondary order_banten" data-banten="{{$banten->id}}">Order</button>
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

   <!--  <br>
    <button type="button" class="btn btn-primary btn-lg">Lihat lebih...</button> -->
    
    
    
@stop
<script type="text/javascript">
    $("#carouselExampleControls").carousel();
</script>