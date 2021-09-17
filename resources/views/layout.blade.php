<!doctype html>
<html lang="en">
  <head>
    @include('partials.metadata')
    @yield('otherstyle')
    <style type="text/css">
      <style type="text/css">
          .direct-chat-contacts {
          -webkit-transform: translate(101%, 0);
          -ms-transform: translate(101%, 0);
          -o-transform: translate(101%, 0);
          transform: translate(101%, 0);
          position: absolute;
          top: 0;
          bottom: 0; 
          width: 100%;
          background: #fff;
          color: #fff;
          overflow: auto;
        }

        .direct-chat-messages {
          -webkit-transform: translate(0, 0);
          -ms-transform: translate(0, 0);
          -o-transform: translate(0, 0);
          transform: translate(0, 0);
          padding: 10px; 
          overflow: auto;
        }

        .add-event-wrapper{
          padding: 15px;
          color: black;
        }
          
      </style>
  </head>
  <body>
    <header>
        @include('partials.header')
    </header>

    <main>
        @yield('content')
    </main>
        
    <footer>
      @include('partials.footer')
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
   <script src="{{asset('vendor/jquery/jquery3.5.1.min.js')}}"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
   <script src="{{asset('vendor/daterangepicker/moment.js')}}"></script>

   <script src="{{asset('vendor/datepicker/bootstrap-datepicker.js')}}"></script>
   <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
   <script src="{{asset('vendor/fullcalendar/fullcalendar.min.js')}}"></script>
   



    @yield('otherscript')
  </body>
</html>