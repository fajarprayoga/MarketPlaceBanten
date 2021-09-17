@extends('layout')
@section('content')
 <div class="col-md-12">
 	<div class="box box-info direct-chat direct-chat-warning">
 		<div class="box-header with-border">
 			<h3 class="box-title">Event Manager</h3>
 			<div class="box-tools pull-right"> 
 				<button type="button" class="btn btn-box-tool btn-success" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
 					<i class="fa fa-plus" style="color: white;"> add</i> </button>
 				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
 				</button>
 					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
 					</button>
 				</div>
 			</div>

 			<div class="box-body"> 
 				<div class="direct-chat-messages" style="height: 570px;">
 					<div id="calendar2" style="width: 100%"></div>
 				</div> 

 				<div class="direct-chat-contacts" style="height: 570px;">

 				 <div class="add-event-wrapper">

          
          <form class="" id="add_event">
            <div  hidden="hidden" ><inputclass="form-control" id="id" name="id" placeholder="Title"></div>
            <div class="form-group">
              <label for="Title" class="col-sm-2 control-label">Title</label> 
              <div class="col-sm-10">
                <input hidden="hidden" class="form-control" id="title" name="title" placeholder="Title">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Label</label> 
              <div class="col-sm-10"> 
                  <h4><span class="label" id="label"></span> </h4>               
                  <li hidden="hidden"><input style="width: 50%; margin-bottom: 10px;" class="form-control" id="color" name="color" placeholder="color" type="color"></li>
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;"> 
                  <ul class="fc-color-picker" id="color-chooser">
                    <li><a class="text-aqua color_label" data-color="#00c0ef" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-blue color_label" data-color="#0073b7" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-light-blue color_label" data-color="#3c8dbc" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-teal color_label" data-color="#39cccc" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-yellow color_label" data-color="#f39c12" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-orange color_label" data-color="#ff851b" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-green color_label" data-color="#00a65a" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-lime color_label" data-color="#01ff70" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-red color_label" data-color="#dd4b39" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-purple color_label" data-color="#605ca8" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-fuchsia color_label" data-color="#f012be" ><i class="fa fa-square"></i></a></li>
                    <li><a class="text-muted color_label" data-color="#777" ><i class="fa fa-square"></i></a></li> 
                    <li hidden="hidden"><a id="color_choosen" data-color="#00000" ><i class="fa fa-flag"></i></a></li> 
                    {{-- <li hidden="hidden"><input class="form-control" id="color" name="color" placeholder="color" ></li> --}}
                    {{-- <li ><input class="form-control" id="color" name="color" placeholder="color" type="color"></li> --}}
                  </ul>
                </div>
              </div> 
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Description</label> 
              <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Start</label> 
              <div class="col-sm-10">
                <input class="form-control date" id="start" name="start" placeholder="Start" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">End</label> 
              <div class="col-sm-10">
                <input class="form-control date" id="end" name="end" placeholder="End" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Url</label> 
              <div class="col-sm-10">
                <input class="form-control" id="url" name="url" placeholder="Url" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Mail</label> 
              <div class="col-sm-10">
                <input class="form-control" id="mail" name="mail" placeholder="Mail" type="email">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input id="public" name="public" type="checkbox"> Make Public
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              </div>
            </div>
                <button id="create_event" class="btn btn-success pull-right">Create</button>
          </form>
          {{-- </form>   --}}
 				</div> 
 			</div>
 		</div>
 	</div> 
@stop
 
@section('otherscript') 
	<script> 
		$(document).ready(function() { 
			$('#start').datepicker({
				autoclose: true, 
    });
    $('#end').datepicker({
      autoclose: true,  
			}); 

			$('.color_label').click(function(event) {
				var choosen_color = this.attributes[1].value;
				$('#color_choosen')[0].style.color = choosen_color; 
				$('#color').val(choosen_color);
      var text = $('#title').val();
      $('#label')[0].innerText= text;
      $('#label').attr('style','background-color:'+choosen_color+'');
			}); 

			$('#calendar2').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listWeek'
				}, 
	      navLinks: true,  
	      editable: true,
	      eventLimit: true, 
	      // events: 'calendar/view',
        eventClick: function(event, element){
          console.log(this.id);
        }
	    }); 
		});


   $(document).on('keyup','#title',function(){
      var text = $('#title').val();
      $('#label')[0].innerText= text;
   });


$('#create_event').click(function(event) {

     var data = [];
     var datalist = $('#add_event')[0]; 

     $.each(datalist,function(index, el) {
      var elmname = $(this).attr("name"); 
      isdate = $(this).hasClass('date');
      if( elmname !== "" && elmname !== undefined && this.value !== null && this.value !== ""){
        if(isdate) {
          data[elmname] = formatDatex(this.value);
        }else{
          if (elmname == 'public') {
            data[elmname] = (this.checked == false ? '0' : '1' ); 
          }else{
            data[elmname] = this.value;                 
          }
        }
      }else{
        if($(el).is('select')){
          data[elmname] = 0;
        }else{
          data[elmname] = "";           
        }
      } 
    }) 
    
     window.location = assetbaseurl;
  });

	</script>

	@stop