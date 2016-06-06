@extends('app')
@section('pagetitle',$medium->title . ' Bearbeiten')

@section('content')
    
    @include('partials/mediumheader', [
        'subtitle' => '- Bearbeiten', 
        'showactions' => false, 
        'backbutton' => true, 
        'backroute' => 'medium.show', 
        'backrouteid' => $medium->slug,
        'prevbutton' => false
        ])

<div class="well">
    {!! Form::model($medium,[
        'method' => 'PATCH',
        'route' => ['medium.update', $medium->id],
        'files' => true,
        'class' => 'form-horizontal'
    ]) !!}
        <div class="form-group">
            {!! Form::label('title','Titel',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('type_id','Typ',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::select(
                'type_id',
                $types,
                $medium->type_id,
                ['class' => 'form-control']
                ) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('file','Titelbild',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-btn">
                        <div class="btn btn-default btn-file">
                            Auswählen <input type="file" name="file" multiple>
                        </div>
                    </div>
                    <input type="text" class="form-control" readonly>
                </div>
            </div>
        </div>  
        <div class="form-group">
            {!! Form::label('eventColor','Farbe (red oder "#f00" oder "rgb(255,0,0)")',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('eventColor',null,['class' => 'form-control', 'placeholder' => '#000000']) !!}
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