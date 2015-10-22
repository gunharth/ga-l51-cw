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
    <table class="table small-text table-striped table-hover ">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kunde</th>
          <th>Kunde/Sujet</th>
          <th>Auftrag/Nr.</th>
          <th>Medium - Ausgabe</th>
          <th>ET</th>
          <th>Format</th>
          <th>Preis <br>€ {{$totalPreis}}</th>
          <th>Rab.</th>
          <th>AP</th>
          <th>Netto</th>
          <th>Brutto</th>
          <th>Berater</th>
          <th>Anmerkung</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($inserate as $inserat)
        <tr>
          <td>{{ $inserat->id }}</td>
          <td>{{ $inserat->client->firma }}</td>
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
          <td>{{ $inserat->preis3 }}</td>
          <td>{{ $inserat->preis4 }}</td>
          <td>{{ $inserat->brutto }}</td>
          <td>{{ $inserat->user->last_name }}</td>
          <td>{{ nl2br($inserat->notes) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop