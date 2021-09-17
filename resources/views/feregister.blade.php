
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="BHGnBpLv27wJ7ZkADIhCifQGutN2Z5s8qRHhjGTr">
    <title>Pemasaran Sarana Upakara</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/iCheck/all.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-fileinput/css/fileinput.min.css?v=4.5.2">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/dist/css/skins/skin-blue-light.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/laravel-admin/laravel-admin.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/nprogress/nprogress.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/nestable/nestable.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/google-fonts/fonts.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css">


    <script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse">
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{url('/')}}">Pemasaran Sarana Upakara</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        
        <ul class="nav navbar-nav navbar-right mr-auto mt-2 mt-lg-0">
          <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Kalender</a></li>
          <li><a href="{{route('fe.banten')}}"><span class="glyphicon glyphicon-queen"></span> Banten</a></li>
           <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Order</a></li>
          <li><a href="{{route('fe.register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <div class="wrapper">
      <section class="content">

        <!-- <form id="post_register" class="form-horizontal model-form-5f2de05e6ea04" action="" > -->
        <form action="{{route('post.register')}}" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_user_register">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="pembeli_id" value="">

          <div class="box-body">
            <div class="fields-group">
              <div class="col-md-12">  

                <div class="form-group  ">
                  <label for="name" class="col-sm-2 asterisk control-label">Name</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                        <input type="text" id="name" name="name" value="" class="form-control name" placeholder="Input Name"  required/>
                    </div> 
                  </div>
                </div>
                <div class="form-group  ">
                  <label for="email" class="col-sm-2 asterisk control-label">Email</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                      <input type="email" id="email" name="email" value="" class="form-control email" placeholder="Input Email" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone_no" class="col-sm-2 asterisk control-label">Phone no</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                      <input style="width: 150px" type="text" id="phone_no" name="phone_no" value="" class="form-control phone_no" placeholder="Input Phone no" />
                    </div>
                  </div>  
                </div>
                <div class="form-group  ">
                  <label for="address" class="col-sm-2  control-label">Address</label>

                  <div class="col-sm-8">
                    <textarea name="address" class="form-control address" rows="5" placeholder="Input Address" required ></textarea>
                  </div>
                </div>

                <div class="form-group  ">
                  <label for="password" class="col-sm-2 asterisk control-label">Password</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-eye-slash fa-fw"></i></span>
                      <input type="password" id="password" name="password" value="" class="form-control password" placeholder="Input Password" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group  ">

                  <label for="origin_image" class="col-sm-2  control-label">Image</label>

                <div class="col-sm-8">

                  <input type="file" class="origin_image" name="origin_image"  />

              </div>
            </div>
          </div>

        <div class="col-md-12">

          <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary" id="klik_register">Submit</button>
          </div>
          <div class="btn-group pull-left">
              <button type="reset" class="btn btn-warning">Reset</button>
          </div>
        </div>
      </form>
      </section>
    </div>
  </main>
<!-- <footer>
  <div style="margin-top: 10px;">
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#"><small>TA Web © Sinom-tec.com</small></a>
      <a href="#">Back to top</a>
        
    </nav>
  </div>
</footer> -->
<script type="text/javascript">
  LA = null;
  swal = null;
</script>

<script data-exec-on-popstate>

$(function () {
  (function () {
    $('form.model-form-5f2de05e6ea04').submit(function (e) {
      e.preventDefault();
      $(this).find('div.cascade-group.hide :input').attr('disabled', true);
    });
})();
    $('.phone_no').inputmask({"mask":"99999999999"});
    $("input.origin_image").fileinput({"overwriteInitial":true,"initialPreviewAsData":true,"msgPlaceholder":"Select image","browseLabel":"Browse","cancelLabel":"Cancel","showRemove":false,"showUpload":false,"showCancel":false,"dropZoneEnabled":false,"deleteExtraData":{"origin_image":"_file_del_","_file_del_":"","_token":"BHGnBpLv27wJ7ZkADIhCifQGutN2Z5s8qRHhjGTr","_method":"PUT"},"deleteUrl":"http:\/\/127.0.0.1:8000\/admin\/","fileActionSettings":{"showRemove":false,"showDrag":false},"allowedFileTypes":["image"]});

      
    $('.container-refresh').off('click').on('click', function() {
      });
    });


</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#klik_register').click(function(){
      // $('#post_register').submit();
      //get form data
      $('.pesan_error').remove();
      var regform = $('#form_user_register').find('input');
      
      var dataform = {};
      if(regform.length > 0){
        var isvalidate = 0;
        $.each(regform,function(){
          var inputname = $(this).attr('name');
          if( inputname != '' && $(this).attr('required')){
            var inputvalue =  $(this).val();
            if(inputvalue == ''){
              if(inputname !== undefined || inputname !== 'undefined'){
                $('<p style="color: red;" class="pesan_error">Data '+inputname+' tidak boleh kosong</p>').insertAfter($(this).closest('.input-group'));
              }
              isvalidate += 1;
            }else{
              dataform[inputname] = inputvalue;
            }
            
          }
        })
        dataform['address'] = $('[name="address"]').val();
      }
      if(isvalidate > 0){
        console.log(dataform);
        return;
      }
      $('#form_user_register').submit();

      // $.ajax({
      //    type:'POST',
      //    url:'{{route("post.register")}}',
      //    data: {"_token": "{{ csrf_token() }}","data":dataform},
      //    dataType: 'json',
      //    success:function(data) {
      //     if(data.status){
      //       window.location = data.redirect_url;
      //     }
      //    }
      // });
    })

    function readURL(input) {
			  if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    
			    reader.onload = function(e) {
			      // var objsrc = $(input).closest('td').find('img'); //untuk multi image
			      // $(objsrc).attr('src', e.target.result);
			      $('.file-preview-image').attr('src', e.target.result);
			    }
			    
			    reader.readAsDataURL(input.files[0]); // convert to base64 string
			  }
			}

			$(".origin_image").change(function() {
			  readURL(this);
			  //add data id to input
			  // setTimeout(function(){ 
			  // 	 $('#uploadbukti_form').submit();
			  // }, 3000);

			});
  })
</script>
        

<!-- REQUIRED JS SCRIPTS -->
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/dist/js/app.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/jquery-pjax/jquery.pjax.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/nprogress/nprogress.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/nestable/jquery.nestable.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/toastr/build/toastr.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/laravel-admin/laravel-admin.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/moment/min/moment-with-locales.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-fileinput/js/fileinput.min.js?v=4.5.2"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/number-input/bootstrap-number-input.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-fileinput/js/plugins/sortable.min.js?v=4.5.2"></script>
<script src="http://127.0.0.1:8000/vendor/laravel-admin/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js"></script>


</body>
</html>
