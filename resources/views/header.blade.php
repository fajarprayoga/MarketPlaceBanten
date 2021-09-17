<style type="text/css">
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/')}}">Pemasaran Sarana Upakara</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    
    <ul class="nav navbar-nav navbar-right mr-auto mt-2 mt-lg-0">
      <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="{{route('fe.kalender')}}"><span class="glyphicon glyphicon-calendar"></span> Kalender</a></li>
      <li><a href="{{route('fe.upakara')}}"><span class="glyphicon glyphicon-tent"></span> Upakara</a></li>
      <li><a href="{{route('fe.banten')}}"><span class="glyphicon glyphicon-queen"></span> Banten</a></li>
       <li><a href="{{route('fe.order')}}"><span class="glyphicon glyphicon-bell"></span> Order</a></li>
       @php
        $pembeli = Session::get('pembeli');
       @endphp
      @if($pembeli)
        <!-- <li><a href="{{route('fe.logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
        <div class="dropdown">
          <!-- <a class="btn btn-secondary dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="avatar.png" alt="Avatar" class="avatar" data-toggle="dropdown">
          </a> -->

          <img src="{{asset('uploads/'.'default-avatar.jpg')}}" alt="Avatar" class="avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            
            <a class="dropdown-item" href="{{route('fe.editpembeli')}}">Edit Data</a>
            <a class="dropdown-item" href="{{route('fe.logout')}}">Logout</a>
            
          </div>
        </div>
      @else
        <li><a href="{{route('fe.register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{route('fe.loginform')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
    </ul>
  </div>
</nav>