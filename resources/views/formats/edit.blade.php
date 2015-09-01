@extends('app')

@section('pagetitle','Neue Format anlegen')

@section('content')




    <div class="row vertical-align">
      <div class="col-md-6"><h1>Bearbeiten</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.show',$medium->slug) }}" class="btn btn-primary">Abbrechen</a>
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::model($format,[
            'method' => 'PATCH',
            'route' => ['medium.issues.formats.update',$medium->slug,$issue->id,$format->id],
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