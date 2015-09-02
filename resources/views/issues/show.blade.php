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


<table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th class="col-xs-3">Details</th>
          <th class="col-xs-3">&nbsp;</th>
          <th class="col-xs-3">Produktionskosten</th>
          <th class="col-xs-3">{{ $issue->productionCosts }}</th>
        </tr>
      </thead>
        <tr>
          <td>Ausgabe / Titel</td><td>{{ $issue->name }}</td>
          <td>Basisanbot für Seiten</td><td>€ {{ $issue->basisanbot }}</td>
        </tr>
        <tr>
          <td>Redaktionsschluss</td><td>{{ $issue->redaktionsschluss }}</td>
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
          <td>-</td><td>&nbsp;</td>
          <td>Vertrieb</td><td>€ {{ $issue->vertriebkosten }}</td>
        </tr>
        <tr>
          <td>-</td><td>&nbsp;</td>
          <td>Sonderkosten</td><td>€ {{ $issue->sonderkosten }}</td>
        </tr>
      </tbody>
    </table>


    <div class="row vertical-align">
      <div class="col-md-8">
        <h2>Formate</h2>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('medium.issues.formats.create', [$medium->slug, $issue->id]) }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
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
            <a href="{{ route('medium.issues.formats.edit', [$medium->slug, $issue->id, $format->id]) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-2x fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.formats.destroy', $medium->slug, $issue->id, $format->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Format löschen" data-message="Wollen Sie '{{ $medium->title }} - {{ $issue->name }} - {{ $format->name }}' wirklich löschen?" data-action="Löschen"><i class="fa fa-2x fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop