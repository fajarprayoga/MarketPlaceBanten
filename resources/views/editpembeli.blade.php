@extends ('layout')
@section ('content')
<div class="container">


  <form action="{{route('post.register')}}" method="post" class="needs-validation" novalidate nctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="pembeli_id" value="{{$sessionpembeli->id}}">
    
    <div>
      
        @php
          $images = 'default-avatar.jpg';

          if($sessionpembeli){
            $images = $sessionpembeli->origin_image;
          }
        @endphp
     
      <img src="{{asset('uploads/'.$images)}}" alt="Avatar" class="avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <input type="file" name="origin_image" id="bukti_bayar" style="visibility: hidden;" class="sel_image">
        
    </div>

    <div class="form-group">
      <div class="col-md-6">
          
          <label for="uname">name:</label>
          <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" value="{{$sessionpembeli->name ?? ''}}" required>
          
      </div>
      <div class="col-md-6"> 
          <label for="email">E-mail:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter username" name="email" value="{{$sessionpembeli->email ?? ''}}" required>
      </div>
      
    </div>

    <div class="form-group">
      <div class="col-md-6">
          
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter username" name="phone" value="{{$sessionpembeli->phone_no ?? ''}}" required>
          
          
      </div>
      <div class="col-md-6">
          <label for="password">password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter username" name="password" value="{{$sessionpembeli->password ?? ''}}" required>
      </div>
      
      
    </div>

    <div class="form-group"> 
      <div class="col-md-12">
        <label for="address">address:</label>
        <textarea type="text" class="form-control" id="address" placeholder="Enter username" name="address" required>{{$sessionpembeli->address ?? ''}}</textarea>
      </div>
    </div>

    <!-- <div class="form-group" style="margin-top: 10px;"> -->
      <div class="col-md-12" style="margin-top: 20px;">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    <!-- </div> -->
    

  
    
  </form>

   
  
</div>

@stop

@section('otherscript')
  <script>
// Disable form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>

@stop