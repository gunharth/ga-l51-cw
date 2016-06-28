@extends('app')

@section('pagetitle', 'Rechnungen')

@section('content')

    <div class="row vertical-align">
      <div class="col-md-8">
        <h1>Rechnungen</h1>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('inserate.create') }}" title="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
      </div>
    </div>
    <hr />

    <table class="table small-text table-striped table-bordered table-hover no-wrap dataTables-inserateIndex">
      <thead>
        <tr>
          <th>R. Nr.</th>
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
      @foreach($invoices as $invoice)
        <tr>
          <td>{{ $invoice->id }}</td>
          <td>{{ $invoice->inserat->client->firma }} {{ $invoice->inserat->client_text }}</td>
          <td>{{ $invoice->inserat->sujet }}</td>
          <td>{{ $invoice->inserat->auftragsnummer }}</td>
          <td>{{ $invoice->inserat->format->get(0)->issue->medium->title }} - {{ $invoice->inserat->format->get(0)->issue->name }}</td>
          <td>{{ $invoice->inserat->format->get(0)->issue->erscheinungstermin }}</td>
          <td>
          @for ($i = 0; $i < count($invoice->inserat->format); $i++)
            {{ $invoice->inserat->format[$i]->name }}
            @if ($invoice->inserat->format[$i]->pivot->pr == 1) PR @endif
            @if ($i < count($invoice->inserat->format)-1) + @endif
          @endfor
          </td>
          <td>{{ $invoice->inserat->art }}</td>
          <td>{{ $invoice->inserat->prettyPreis }}</td>
          <td>{{ $invoice->inserat->prettyPreis2 }}</td>
          <td>{{ $invoice->inserat->prettyNetto }}</td>
          <td>{{ $invoice->inserat->prettyPreis4 }}</td>
          <td>{{ $invoice->inserat->prettyBrutto }}</td>
          <td>{{ $invoice->inserat->user->last_name }}</td>
          <td>{{ nl2br($invoice->inserat->notes) }}</td>
          <td>
            <a href="{{ route('inserate.edit', $invoice->inserat->id) }}" title="bearbeiten"><i class="fa fa-edit fa-lg" data-toggle="tooltip" data-original-title="bearbeiten"></i></a>
            <a href="{{ url('printInvoice', $invoice->inserat->id) }}" title="drucken"><i class="fa fa-print fa-lg" data-toggle="tooltip" data-original-title="drucken"></i></a>
            <a href="/generateGutschrift/{{ $invoice->inserat->id }}" title="gutschrift" class="generateGutschrift"><i class="fa fa-google fa-lg" data-toggle="tooltip" data-original-title="gutschrift"></i></a>
            <a href="/duplicateInvoice/{{ $invoice->inserat->id }}" title="duplizieren" class="duplicateInvoice"><i class="fa fa-files-o fa-lg" data-toggle="tooltip" data-original-title="duplizieren"></i></a>
          
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop