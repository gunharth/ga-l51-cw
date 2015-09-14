@extends('app')

@section('pagetitle', $medium->title)

@section('content')

  @include('partials/mediumheader', [
      'subtitle' => '', 
      'showactions' => true, 
      'backbutton' => false, 
      'backroute' => '', 
      'backrouteid' => '',
      'prevbutton' => false
      ])
    <div class="row vertical-align">
      <div class="col-md-8">
        <h2>Ausgaben</h2>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('medium.issues.create',$medium->slug) }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
      </div>
    </div>
    <table class="table table-striped table-hover table-condensed table-bordered">
      <thead>
        <tr>
          <th>Titel</th>
          <th>Erscheinungstermin</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($medium->issues as $issue)
        <tr data-href="{{ route('medium.issues.show', [$medium->slug,$issue->id]) }}" class="clickable @if($issue->archive != '1') success @endif">
          <td>{{ $issue->name }}</td>
          <td>{{ $issue->erscheinungstermin }}</td>
          <td class="text-right">
            <a href="{{ route('medium.issues.edit', [$medium->slug,$issue->id]) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-2x fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
            {!! Form::open(
                ['method' => 'PATCH',
                'route' => ['medium.issues.update', $medium->slug,$issue->id],
                'style' => 'display: inline;'
            ]) !!}
                {!! Form::hidden('archive','1') !!}
                 <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe archivieren" data-message="Wollen Sie {{ $medium->title }} - Ausgabe {{ $issue->name }} wirklich archivieren?" data-action="Archivieren"><i class="fa fa-2x fa-archive" data-toggle="tooltip" data-original-title="archivieren"></i></a>
            {!! Form::close() !!}
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.destroy', $medium->slug,$issue->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe löschen" data-message="Wollen Sie {{ $medium->title }} - Ausgabe {{ $issue->name }} wirklich löschen?" data-action="Löschen"><i class="fa fa-2x fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop