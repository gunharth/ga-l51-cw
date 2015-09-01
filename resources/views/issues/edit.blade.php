@extends('app')

@section('pagetitle', $medium->title . ' - ' .  $issue->name)

@section('content')

    @include('partials/mediumheader', [
        'subtitle' => '- Ausgabe ' . $issue->name,
        'showactions' => false, 
        'backbutton' => true, 
        'backroute' => 'medium.show', 
        'backrouteid' => $medium->slug
        ])

<div class="well">
    {!! Form::model($issue,[
        'method' => 'PATCH',
        'route' => ['medium.issues.update', $medium->slug,$issue->id],
        'class' => 'form-horizontal'
    ]) !!}
        <div class="form-group">
            {!! Form::label('name','Titel',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Titel']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('redaktionsschluss','Redaktionsschluss',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10 input-group date">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              {!! Form::text('redaktionsschluss',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('drucktermin','Drucktermin',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10 input-group date">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              {!! Form::text('drucktermin',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('erscheinungstermin','Erscheinungstermin',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10 input-group date">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              {!! Form::text('erscheinungstermin',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('druckerei','Druckerei',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('druckerei',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('vertrieb','Vertrieb',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('vertrieb',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('druckauflage','Druckauflage',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('druckauflage',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
   </div>


    <div class="row vertical-align">
      <div class="col-md-8">
        <h3>Formate</h3>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('medium.issues.formats.create', [$medium->slug, $issue->id]) }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit"></i> Neu</a>
      </div>
    </div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Formate</th>
          <th>Preis</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($issue->formats as $format)
        <tr>
          <td>{{ $format->name }}</td>
          <td>{{ $format->preis }}</td>
          <td class="text-right">
            <a href="{{ route('medium.issues.formats.edit', [$medium->slug, $issue->id, $format->id]) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.formats.destroy', $medium->slug, $issue->id, $format->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Format löschen" data-message="Wollen Sie '{{ $medium->title }} - {{ $issue->name }} - {{ $format->name }}' wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop