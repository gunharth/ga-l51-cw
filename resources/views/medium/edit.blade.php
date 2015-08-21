@extends('app')
@section('pagetitle',$medium->title . ' Bearbeiten')

@section('content')
    <div class="row vertical-align">
        <div class="col-md-10">
          <h1>{{ $medium->title }}</h1>
        </div>
        <div class="col-md-2 text-right">
          <a href="{{ route('medium.show',$medium->slug) }}" class="btn btn-primary">Abbrechen</a>
        </div>
    </div>
    <hr />
<div class="well">
    {!! Form::model($medium,[
        'method' => 'PATCH',
        'route' => ['medium.update', $medium->id],
        'files' => true
    ]) !!}
        <div class="form-group">
            {!! Form::label('title','Titel',['class' => 'col-xs-2']) !!}
            {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel']) !!}
        </div>
        <div class="form-group">
          <label for="type_id" class="col-lg-2 control-label">Typ</label>
            {!! Form::select('type_id',$types,$medium->type_id,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-btn">
                    <div class="btn btn-default btn-file">
                        Cover <input type="file" name="file" multiple>
                    </div>
                </div>
                <input type="text" class="form-control" readonly>
            </div>
        </div>  
        <div class="form-group">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
   </div>
  @stop