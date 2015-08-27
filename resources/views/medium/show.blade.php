@extends('app')

@section('pagetitle', $medium->title)

@section('content')

@include('partials/mediumheader', ['showactions' => true])



    <div class="row vertical-align">
      <div class="col-md-8">
        <h2>Ausgaben</h2>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('medium.issues.create',$medium->slug) }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit"></i> Neu</a>
      </div>
    </div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Ausgabe</th>
          <th>Erscheinungstermin</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($medium->issues as $issue)
        <tr>
          <td>{{ $issue->name }}</td>
          <td>dd.mm.YYY</td>
          <td class="text-right">
            <a href="{{ route('medium.issues.edit', [$medium->slug,$issue->id]) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
            {!! Form::open(
                ['method' => 'PATCH',
                'route' => ['medium.issues.update', $issue->id],
                'style' => 'display: inline;'
            ]) !!}
                {!! Form::hidden('archive','1') !!}
                 <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe archivieren" data-message="Wollen Sie {{ $issue->name }} wirklich archivieren?" data-action="Archivieren"><i class="fa fa-lg fa-archive" data-toggle="tooltip" data-original-title="archivieren"></i></a>
            {!! Form::close() !!}
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.destroy', $medium->slug,$issue->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Ausgabe löschen" data-message="Wollen Sie {{ $issue->name }} wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>

<div class="well">
  <p>Dev notes: Medium anlegen - atomatisch Sonderformat anlegen</p>
</div>

  @stop