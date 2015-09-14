@extends('app')

@section('pagetitle','Ausgabe')
@section('title','Neue Ausgabe anlegen')

@section('content')

    @include('partials/mediumheader', [
        'subtitle' => '- neue Ausgabe anlegen', 
        'showactions' => false, 
        'backbutton' => true, 
        'backroute' => 'medium.show', 
        'backrouteid' => $medium->slug,
        'prevbutton' => false
        ])
    <div class="well">
        {!! Form::open([
            'route' => ['medium.issues.store',$medium->id],
            'class' => 'form-horizontal'
        ]) !!}
        <div class="form-group">
            {!! Form::label('name','Name',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
   </div>
  @stop