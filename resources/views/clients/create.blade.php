@extends('app')

@section('pagetitle','Neuen Kunden anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neuen Kunden anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('clients.index') }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'clients.store',
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