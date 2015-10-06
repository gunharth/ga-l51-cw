@extends('app')

@section('pagetitle', 'Inserate')

@section('content')

    <div class="row vertical-align">
      <div class="col-md-8">
        <h1>Inserate</h1>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('inserate.create') }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
      </div>
    </div>
    <hr />
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kunde</th>
          <th>Agentur</th>
          <th>Medium</th>
          <th>Erscheinungstermin</th>
          <th>Ausgabe</th>
          <th>Format</th>
          <th>Preis</th>
          <th>Rab.</th>
          <th>AP</th>
          <th>Netto</th>
          <th>Brutto</th>
          <th>Berater</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($inserate as $inserat)
        <tr>
          <td>{{ $inserat->id }}</td>
          <td>{{ $inserat->client->name }}</td>
          <td>{{ $inserat->agent->name }}</td>
          <td>{{ $inserat->format->issue->medium->title }}</td>
          <td>{{ $inserat->format->issue->erscheinungstermin }}</td>
          <td>{{ $inserat->format->issue->name }}</td>
          <td>{{ $inserat->format->name}}</td>
          <td>{{ $inserat->preis }}</td>
          <td>{{ $inserat->preis2 }}</td>
          <td>{{ $inserat->preis3 }}</td>
          <td>{{ $inserat->preis4 }}</td>
          <td>{{ $inserat->brutto }}</td>
          <td>{{ $inserat->user->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop