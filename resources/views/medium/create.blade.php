@extends('app')

@section('pagetitle','Medium')
@section('title','Neues Medium anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neues Medium anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.index') }}" class="btn btn-primary">Abbrechen</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'medium.store'
        ]) !!}
        {!! Form::hidden('type_id','1') !!}
        <div class="form-group">
            {!! Form::label('title','Titel') !!}
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel', 'required' => 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
  @stop