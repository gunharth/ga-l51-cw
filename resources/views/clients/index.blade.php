@extends('app')

@section('pagetitle','Kunden')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Kunden</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('clients.create') }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
        </div>
    </div>
    <hr  />
    <div class="row">
      

    <table class="table table-striped table-hover table-condensed table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firma</th>
          <th>Anschrift</th>
          <th>Tel</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($clients as $client)
        <tr data-href="{{ route('clients.show', $client->id) }}" class="clickable">
          <td>{{ $client->id }}</td>
          <td>{{ $client->firma }}</td>
          <td>{{ $client->strasse }}<br />{{ $client->plz }} {{ $client->ort }}</td>
          <td>{{ $client->tel }}</td>
          <td class="text-right">
            <a href="{{ route('clients.edit', $client->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-2x fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['clients.destroy', $client->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Kunde löschen" data-message="Wollen Sie {{ $client->name }} wirklich löschen?" data-action="Löschen"><i class="fa fa-2x fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  @stop