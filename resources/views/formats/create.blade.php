@extends('app')

@section('pagetitle','Neue Format anlegen')

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
      <div class="col-md-12"><h2>Neues Format anlegen</h2></div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => ['medium.issues.formats.store',$medium->id,$issue->id],
            'class' => 'form-horizontal'
        ]) !!}
        @include('formats._form')
        {!! Form::close() !!}
   </div>
  @stop