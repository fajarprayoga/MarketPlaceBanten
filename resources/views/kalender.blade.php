@extends('layout')
@section('otherstyle')
	<link rel="stylesheet" href="{{asset('vendor/fullcalendar/main.css')}}">
	<style>

	  body {
	    margin: 40px 10px;
	    padding: 0;
	    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
	    font-size: 14px;
	  }

	  #calendar {
	    max-width: 1100px;
	    margin: 0 auto;
	  }

	</style>
@stop
@section('content')
	<div id='calendar'></div>
@stop
 
@section('otherscript') 
	<script src="{{asset('vendor/fullcalendar/main.js')}}"></script>

	<script>
		function formatDate(date) {
		    var d = new Date(date),
		        month = '' + (d.getMonth() + 1),
		        day = '' + d.getDate(),
		        year = d.getFullYear();

		    if (month.length < 2) 
		        month = '0' + month;
		    if (day.length < 2) 
		        day = '0' + day;

		    return [year, month, day].join('-');
		}

		var currentdate = formatDate(Date());
		var currentevent = @json($eventupakara);
		// console.log(currentevent);
	  document.addEventListener('DOMContentLoaded', function() {
	    var calendarEl = document.getElementById('calendar');

	    var calendar = new FullCalendar.Calendar(calendarEl, {
	      headerToolbar: {
	        left: 'prevYear,prev,next,nextYear today',
	        center: 'title',
	        right: 'dayGridMonth,dayGridWeek,dayGridDay'
	      },
	      initialDate: currentdate,
	      navLinks: true, // can click day/week names to navigate views
	      editable: true,
	      dayMaxEvents: true, // allow "more" link when too many events
	      events: currentevent
	      // events: [
	      //   {
	      //     title: 'All Day Event',
	      //     start: '2020-06-01'
	      //   },
	      //   {
	      //     title: 'Long Event',
	      //     start: '2020-06-07',
	      //     end: '2020-06-10'
	      //   },
	      //   {
	      //     groupId: 999,
	      //     title: 'Repeating Event',
	      //     start: '2020-06-09T16:00:00'
	      //   },
	      //   {
	      //     groupId: 999,
	      //     title: 'Repeating Event',
	      //     start: '2020-06-16T16:00:00'
	      //   },
	      //   {
	      //     title: 'Conference',
	      //     start: '2020-06-11',
	      //     end: '2020-06-13'
	      //   },
	      //   {
	      //     title: 'Meeting',
	      //     start: '2020-06-12T10:30:00',
	      //     end: '2020-06-12T12:30:00'
	      //   },
	      //   {
	      //     title: 'Lunch',
	      //     start: '2020-06-12T12:00:00'
	      //   },
	      //   {
	      //     title: 'Meeting',
	      //     start: '2020-06-12T14:30:00'
	      //   },
	      //   {
	      //     title: 'Happy Hour',
	      //     start: '2020-06-12T17:30:00'
	      //   },
	      //   {
	      //     title: 'Dinner',
	      //     start: '2020-06-12T20:00:00'
	      //   },
	      //   {
	      //     title: 'Birthday Party',
	      //     start: '2020-06-13T07:00:00'
	      //   },
	      //   {
	      //     title: 'Click for Google',
	      //     url: 'http://google.com/',
	      //     start: '2020-06-28'
	      //   },
	      //   {
	      //     title: "Ngaben 1",
	      //     start: '2020-08-22',
	      //     end: '2020-08-28'
	      //   }
	      // ]
	    });

	    calendar.render();
	  });

	</script>
@stop