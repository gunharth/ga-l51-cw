@extends('app')

@section('pagetitle', $medium->title . ' - ' .  $issue->name)

@section('content')

    @include('partials/mediumheader', [
        'subtitle' => '- Ausgabe ' . $issue->name,
        'showactions' => false, 
        'backbutton' => true, 
        'backroute' => 'medium.show', 
        'backrouteid' => $medium->slug,
        'prevbutton' => false
        ])

<div class="row">
        <div class="col-sm-3">
          <h2>Umsatz</h2> {{ $inserate->totalNetto }} / {{ $issue->sollumsatz }}
          <p class="data-attributes">
  <span data-peity='{ "fill": ["green", "#eeeeee"],    "innerRadius": 10, "radius": 40 }'>{{ $inserate->totalNettoRaw }}/{{ $issue->sollumsatz }}</span>
</p>
        </div>
        <div class="col-sm-3">
          <h2>Seiten</h2> {{ $inserate->totalFlaeche }} / {{ $issue->seiten }}
          <p class="data-attributes">
  <span data-peity='{ "fill": ["green", "#eeeeee"],    "innerRadius": 10, "radius": 40 }'>{{ $inserate->totalFlaeche }}/{{ $issue->seiten }}</span>
</p>
        </div>
        <div class="col-sm-3">
        <h2>Ist</h2>
        <p><strong>Anzahl/Aufträge Total: {{$inserate->totalInserate}}</strong></p>
        <p><strong>Seiten Total: {{$inserate->totalFlaeche}}</strong></p>
        <p><strong>Preis Total: € {{$inserate->totalPreis}}</strong></p> 
        </div>
        <div class="col-sm-3">
        <h2>&nbsp;</h2>
        <p><strong>Rabatt Total: {{$inserate->totalRabattProz}}%</strong></p>
        <p><strong>Netto Total: € {{$inserate->totalNetto}}</strong></p>
        <p><strong>Brutto Total: € {{$inserate->totalBrutto}}</strong></p> 
        </div>
      </div>
<hr>
<h2>Aufträge</h2>
<table class="table small-text table-striped table-bordered table-hover no-wrap dataTables-issueShow">
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
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($issue->inserate as $inserat)
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
          <td class="text-nowrap">
            <a href="{{ url('printInvoice', $inserat->id) }}" title="rechnung"><i class="fa fa-envelope-o fa-lg" data-toggle="tooltip" data-original-title="rechnung"></i></a> 
            <a href="{{ route('inserate.edit', $inserat->id) }}" title="bearbeiten"><i class="fa fa-edit fa-lg" data-toggle="tooltip" data-original-title="bearbeiten"></i></a>
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
<hr>
<h2>Produktionsdaten</h2>
<table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th class="col-xs-3">Details</th>
          <th class="col-xs-3">&nbsp;</th>
          <th class="col-xs-3">Produktionskosten</th>
          <th class="col-xs-3">€ {{ $issue->productionCosts }}</th>
        </tr>
      </thead>
        <tr>
          <td>Ausgabe / Titel</td><td>{{ $issue->name }}</td>
          <td>Basisanbot für Seiten</td><td>€ {{ $issue->basisanbot }}</td>
        </tr>
        <tr>
          <td>Starttermin</td><td>{{ $issue->redaktionsschluss }}</td>
          <td>Redaktion</td><td>€ {{ $issue->redaktion }}</td>
        </tr>
        <tr>
          <td>Drucktermin</td><td>{{ $issue->drucktermin }}</td>
          <td>Fotokosten / Covershooting</td><td>€ {{ $issue->fotokosten }}</td>
        </tr>
        <tr>
          <td>Erscheinungstermin</td><td>{{ $issue->erscheinungstermin }}</td>
          <td>Grafik und Repro</td><td>€ {{ $issue->grafik }}</td>
        </tr>
        <tr>
          <td>Druckerei</td><td>{{ $issue->druckerei }}</td>
          <td>Lektorat</td><td>€ {{ $issue->lektorat }}</td>
        </tr>
        <tr>
          <td>Vertrieb</td><td>{{ $issue->vertrieb }}</td>
          <td>Kosten Mehrseiten p.S.</td><td>€ {{ $issue->mehrseiten }}</td>
        </tr>
        <tr>
          <td>Druckauflage</td><td>{{ $issue->druckauflage }}</td>
          <td>Druck</td><td>€ {{ $issue->druck }}</td>
        </tr>
        <tr>
          <td>Seiten</td><td>{{ $issue->seiten }}</td>
          <td>Vertrieb</td><td>€ {{ $issue->vertriebkosten }}</td>
        </tr>
        <tr>
          <td>Soll/Umsatz</td><td>€ {{ $issue->sollumsatz }}</td>
          <td>Sonderkosten</td><td>€ {{ $issue->sonderkosten }}</td>
        </tr>
        <tr>
          <td>Projektverantwortung</td><td>{{ $issue->user }}</td>
          <td></td>
        </tr>
      </tbody>
    </table>


    <div class="row vertical-align">
      <div class="col-md-8">
        <h2>Formate</h2>
      </div>
      <div class="col-md-4 text-right">
          
      </div>
    </div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Formate</th>
          <th>Fläche</th>
          <th>Preis</th>
        </tr>
      </thead>
      @foreach($issue->formats as $format)
        <tr>
          <td>{{ $format->name }}</td>
          <td>{{ $format->flaeche }}</td>
          <td>{{ $format->preis }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop