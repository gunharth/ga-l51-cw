@extends('app')

@section('pagetitle','Neues Medium anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neues Medium anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.index') }}" class="btn btn-primary">Zurück</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'medium.store',
            'class' => 'form-horizontal'
        ]) !!}
        <div class="form-group">
            {!! Form::label('title','Titel',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel']) !!}
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