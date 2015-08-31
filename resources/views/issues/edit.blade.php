@extends('app')

@section('pagetitle', $issue->name)

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
            {!! Form::label('name','Redaktionsschluss',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Drucktermin',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Erscheinungstermin',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Druckerei',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Vertrieb',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name','Druckauflage',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ausgabe']) !!}
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
          <th>Erscheinungstermin</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($issue->formats as $format)
        <tr>
          <td>{{ $format->name }}</td>
          <td>dd.mm.YYY</td>
          <td class="text-right">
            <a href="{{ route('medium.issues.formats.edit', $format->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
            {!! Form::open(
                ['method' => 'PATCH',
                'route' => ['medium.issues.formats.update', $format->id],
                'style' => 'display: inline;'
            ]) !!}
                {!! Form::hidden('archive','1') !!}
                 <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe archivieren" data-message="Wollen Sie {{ $format->name }} wirklich archivieren?" data-action="Archivieren"><i class="fa fa-lg fa-archive" data-toggle="tooltip" data-original-title="archivieren"></i></a>
            {!! Form::close() !!}
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.formats.destroy', $issue->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe löschen" data-message="Wollen Sie {{ $medium->title }} - {{ $format->name }} wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop