@extends('app')

@section('pagetitle','Inserat')
@section('title','Neues Inserat anlegen')

@section('content')

    <div class="well">
        {!! Form::open([
            'route' => ['inserate.store'],
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