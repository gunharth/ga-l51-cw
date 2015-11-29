@extends('app')

@section('pagetitle',$client->firma)

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>{{ $client->firma }}</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('clients.index') }}" title="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
    <div class="row">
    <div class="col-sm-6">
    <table class="table">
    <tr><td><strong>Firma</strong></td><td>{{ $client->firma }}</td></tr>
    <tr><td><strong>Anprache / Person</strong></td><td>{{ $client->ansprache }}</td></tr>
    <tr><td><strong>Strasse</strong></td><td>{{ $client->strasse }}</td></tr>
    <tr><td><strong>PLZ</strong></td><td>{{ $client->plz }}</td></tr>
    <tr><td><strong>Ort</strong></td><td>{{ $client->ort }}</td></tr>
</table>
</div>
 <div class="col-sm-6">
<table class="table">
    <tr><td><strong>Tel.</strong></td><td>{{ $client->tel }}</td></tr>
    <tr><td><strong>Agentur</strong></td><td> @if ($client->agent === 1) Ja @else Nein @endif </td></tr>
    <tr><td><strong>UID</strong></td><td>{{ $client->vat_country }}{{ $client->vat_number }}</td></tr>
</table>
</div>
</div>
</div>

        
    <h2>Aufträge</h2>
<table class="table small-text table-striped table-bordered table-hover no-wrap dataTables-clientShow">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kunde</th>
          <th>Kunde/Sujet</th>
          <th>Auftrag/Nr.</th>
          <th>Medium - Ausgabe</th>
          <th>ET</th>
          <th>Format</th>
          <th>Art</th>
          <th>Preis</th>
          <th>Rab.</th>
          <th>AP/Netto</th>
          <th>WA</th>
          <th>Brutto</th>
          <th>Berater</th>
          <th>Anmerkung</th>
        </tr>
      </thead>
      <tbody>
      @foreach($inserate as $inserat)
        <tr>
          <td>{{ $inserat->id }}</td>
          <td>{{ $inserat->client->firma }} {{ $inserat->client_text }}</td>
          <td>{{ $inserat->sujet }}</td>
          <td>{{ $inserat->auftragsnummer }}</td>
          <td>{{ $inserat->format->get(0)->issue->medium->title }} - {{ $inserat->format->get(0)->issue->name }}</td>
          <td>{{ $inserat->format->get(0)->issue->erscheinungstermin }}</td>
          <td>
          @for ($i = 0; $i < count($inserat->format); $i++)
            {{ $inserat->format[$i]->name }}
            @if ($inserat->format[$i]->pivot->pr == 1) PR @endif
            @if ($i < count($inserat->format)-1) + @endif
          @endfor
          </td>
          <td>{{ $inserat->art }}</td>
          <td>{{ $inserat->preis }}</td>
          <td>{{ $inserat->preis2 }}</td>
          <td>{{ $inserat->netto }}</td>
          <td>{{ $inserat->preis4 }}</td>
          <td>{{ $inserat->brutto }}</td>
          <td>{{ $inserat->user->last_name }}</td>
          <td>{{ nl2br($inserat->notes) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
@stop