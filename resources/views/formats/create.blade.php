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
        <div class="form-group">
            {!! Form::label('name','Titel',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Format Titel']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preis','Preis',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10 input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','preis',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
  @stop