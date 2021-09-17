@extends ('layout')
@section ('content')
<div class="container">


  <form action="{{route('fe.loginpembeli')}}" method="post" class="needs-validation" novalidate nctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="uname">E-mail:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    @if(!is_null(session('msg')))
   <div class="form-group">
      <div class="alert alert-danger" role="alert">
        {{session('msg')}}
      </div>
    </div>
      
  @endif
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required><span style="padding-left: 20px;">Rembember.</span> 
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" class="btn btn-primary">login</button>
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