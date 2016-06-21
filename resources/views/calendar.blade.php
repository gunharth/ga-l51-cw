@extends('app')

@section('title','Kalender')

@section('styles')
<link rel="stylesheet" href="css/fullcalendar-year.css">
<link rel="stylesheet" href="css/fullcalendar-year.print.css" media='print'>
@endsection

@section('content')
    <div class="row">
      <div class="col-sm-12">
      <h2>Produktionsplan</h2>
      </div>
      <div class="col-sm-12">
        <div id="calendar"></div>
      </div>
    </div>
  @stop

@section('scripts')
<script src="js/fullcalendar-year.js"></script>
<script src="js/fullcalendar-de.js"></script>
<script>
$(document).ready(function() {
    $("#calendar").fullCalendar({
        defaultView: 'year',
        header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,agendaWeek,agendaDay'
            },
        editable: false,
        yearColumns: 2,
        eventSources: [

        // your event source
        {
            url: '/calendar/events', // use the `url` property
            allDayDefault: true
        },
        

        // any other sources...

    ],
    eventRender: function(event, element) {
        element.qtip({
            position: {
            my: 'bottom center',
            at: 'top center',
            target: 'mouse',
            viewport: $('#calendar'),
            adjust: {
                mouse: false,
                scroll: false
            }
        },
            content: {
                 text: event.title + ' + more details and dates'
             }
        });
    }
    });
});
</script>

@endsection