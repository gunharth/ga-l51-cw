@extends('app')

@section('title','Produktionsplan')

@section('styles')
<link rel="stylesheet" href="css/fullcalendar.css">
<link rel="stylesheet" href="css/fullcalendar-scheduler.css">
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
<script src="js/fullcalendar.js"></script>
<script src="js/fullcalendar-de.js"></script>
<script src="js/fullcalendar-scheduler.js"></script>
<script>
$(document).ready(function() {
    $("#calendar").fullCalendar({
        defaultView: 'timelineMonth',
        header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
        editable: false,
        resourceAreaWidth: 230,
        eventSources: [

        // your event source
        {
            url: '/timeline/events', // use the `url` property
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
                mouse: true,
                scroll: false
            },
            
        },
            content: {
                 text: event.description
             }
        });
    },
    resourceLabelText: 'Medium',
    resources: {
            url: '/timeline/medium', // use the `url` property
        },
        resourceRender: function(resourceObj, labelTds, bodyTds) {
            labelTds.css('background', (resourceObj.eventColor!='' ? resourceObj.eventColor : "#3a87ad"));
        }
    });
});
</script>

@endsection