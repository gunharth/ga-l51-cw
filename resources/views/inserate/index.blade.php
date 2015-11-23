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
  

  <table class="table small-text table-striped table-bordered no-wrap">
      <tr>
          <td><strong>Anzahl/Aufträge Total: {{$inserate->totalInserate}}</strong></td>
          <td><strong>Seiten Total: {{$inserate->totalFlaeche}}</strong></td>
          <td><strong>Preis Total: € {{$inserate->totalPreis}}</strong></td>
          <td><strong>Rabatt Total: {{$inserate->totalRabattProz}}%</strong></td>
          <td><strong>Netto Total: € {{$inserate->totalNetto}}</strong></td>
          <td><strong>Brutto Total: € {{$inserate->totalBrutto}}</strong></td>
        </tr>
    </table>

    <table class="table small-text table-striped table-bordered table-hover no-wrap dataTables-inserateIndex">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kunde</th>
          <th>Kunde/Sujet</th>
          <th>Auftrag/Nr.</th>
          <th>Medium - Ausgabe</th>
          <th>ET</th>
          <th>Format</th>
          <th>Preis</th>
          <th>Rab.</th>
          <th>AP/Netto</th>
          <th>WA</th>
          <th>Brutto</th>
          <th>Berater</th>
          <th>Anmerkung</th>
          <th></th>
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
          <td>{{ $inserat->preis }}</td>
          <td>{{ $inserat->preis2 }}</td>
          <td>{{ $inserat->netto }}</td>
          <td>{{ $inserat->preis4 }}</td>
          <td>{{ $inserat->brutto }}</td>
          <td>{{ $inserat->user->last_name }}</td>
          <td>{{ nl2br($inserat->notes) }}</td>
          <td class="text-nowrap">
            <a href="{{ route('inserate.edit', $inserat->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-edit fa-lg" data-toggle="tooltip" data-original-title="bearbeiten"></i></a>
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['inserate.destroy', $inserat->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Inserat löschen" data-message="Wollen Sie dieses Inserat wirklich löschen?" data-action="Löschen"><i class="fa fa-trash-o fa-lg" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop