@extends('app')

@section('pagetitle','Neue Format anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neues Format anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.show',$medium->slug) }}" class="btn btn-primary">Abbrechen</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => ['medium.issues.formats.store',$medium->id,$issue->id]
        ]) !!}
        <div class="form-group">
            {!! Form::label('name','Format') !!}
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Format']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
   </div>
  @stop