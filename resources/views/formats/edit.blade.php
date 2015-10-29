@extends('app')

@section('pagetitle','Format bearbeiten')

@section('content')
    
    @include('partials/mediumheader', [
        'subtitle' => '- Ausgabe ' . $issue->name,
        'showactions' => false, 
        'backbutton' => false, 
        'backroute' => 'medium.show', 
        'backrouteid' => $medium->slug,
        'prevbutton' => true
        ])

    <div class="row vertical-align">
      <div class="col-md-12"><h2>Format Bearbeiten</h2></div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::model($format,[
            'method' => 'PATCH',
            'route' => ['medium.issues.formats.update',$medium->slug,$issue->id,$format->id],
            'class' => 'form-horizontal'
        ]) !!}
        @include('formats._form')
        {!! Form::close() !!}
   </div>
  @stop