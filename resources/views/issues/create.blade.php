@extends('app')

@section('pagetitle','Ausgabe')
@section('title','Neue Ausgabe anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neues Medium anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.show',$medium->id) }}" class="btn btn-primary">Abbrechen</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => ['medium.issues.store',$medium->id]
        ]) !!}
        <div class="form-group">
            {!! Form::label('name','Ausgabe',['class' => 'col-xs-2']) !!}
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
  @stop