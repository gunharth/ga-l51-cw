@extends('app')

@section('pagetitle','Neue Kategorie anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neue Kategorie anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('types.index') }}" class="btn btn-primary">Zurück</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'types.store'
        ]) !!}
        <div class="form-group">
            {!! Form::label('title','Titel') !!}
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Titel', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
  @stop