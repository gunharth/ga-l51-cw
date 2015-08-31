@extends('app')
@section('pagetitle',$type->title . ' Bearbeiten')

@section('content')
    <div class="row vertical-align">
        <div class="col-md-10">
          <h1>{{ $type->title }}</h1>
        </div>
        <div class="col-md-2 text-right">
          <a href="{{ route('types.index',$type->slug) }}" class="btn btn-primary">Zurück</a>
        </div>
    </div>
    <hr />
<div class="well">
    {!! Form::model($type,[
        'method' => 'PATCH',
        'route' => ['types.update', $type->id],
        'class' => 'form-horizontal'
    ]) !!}
        <div class="form-group">
            {!! Form::label('title','Titel',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'type Titel']) !!}
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