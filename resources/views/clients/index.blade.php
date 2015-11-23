@extends('app')

@section('pagetitle','Kunden')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Kunden</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('clients.create') }}" title="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
        </div>
    </div>
    <hr  />
      
    
    <table class="table small-text table-striped table-bordered table-hover no-wrap dataTables-inserateIndex">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firma</th>
          <th>Ansprache/Person</th>
          <th>Anschrift</th>
          <th>Tel</th>
          <th></th>
        </tr>
      </thead>
      @foreach($clients as $client)
        <tr data-href="{{ route('clients.show', $client->id) }}" class="">
          <td>{{ $client->id }}</td>
          <td>{{ $client->firma }}</td>
          <td>{{ $client->ansprache }}</td>
          <td>{{ $client->strasse }}<br />{{ $client->plz }} {{ $client->ort }}</td>
          <td>{{ $client->tel }}</td>
          <td class="text-right">
            <a href="{{ route('clients.show', $client->id) }}" title="anzeigen"><i class="fa fa-lg fa-eye" data-toggle="tooltip" data-original-title="anzeigen"></i></a> 
            <a href="{{ route('clients.edit', $client->id) }}" title="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['clients.destroy', $client->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Kunde löschen" data-message="Wollen Sie {{ $client->firma }} wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop