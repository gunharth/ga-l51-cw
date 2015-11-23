@extends('app')

@section('title','Dashboard')

@section('content')
	<div class="row vertical-align">
    <div class="col-sm-12 col-md-12">
      <h1>Dashboard</h1>
    </div>
  </div>
    <hr />
    <div class="row">
      @foreach($issues as $issue)
      <div class="col-sm-3 text-center">
      <div style="border: 1px solid #e6e6e6; border-radius: 5px; padding: 5px;">
        <h3>{{ $issue->medium->title }} <br> {{ $issue->name }}</h3>
        <div class="row">
          <div class="col-sm-6">
            <h4>Umsatz</h4> <small>{{ $issue->totalNetto }} / {{ $issue->sollumsatz }}</small>
            <p class="data-attributes">
              <span data-peity='{ "fill": ["green", "#eeeeee"],    "innerRadius": 10, "radius": 40 }'>{{ $issue->totalNettoRaw }}/{{ $issue->sollumsatzRaw }}</span>
            </p>
            
          </div>
          <div class="col-sm-6">
            <h4>Seiten</h4> <small>{{ $issue->totalFlaeche }} / {{ $issue->seiten }}</small>
            <p class="data-attributes">
              <span data-peity='{ "fill": ["green", "#eeeeee"],    "innerRadius": 10, "radius": 40 }'>{{ $issue->totalFlaeche }}/{{ $issue->seiten }}</span>
            </p>
          </div>
          <div class="col-sm-12 text-right">
        <a href="{{ route('medium.issues.show', [$issue->medium->slug,$issue->id]) }}" title="anzeigen"><i class="fa fa-lg fa-eye" data-toggle="tooltip" data-original-title="anzeigen"></i></a> 
        </div>
        </div>
        
        </div>
      </div>
      @endforeach
    </div>
    <!--
    <div class="row">
      <div class="col-sm-6">
        <h2>Statistik Ideen </h2>
        Umsatzzahlen (Gesamt/Verkäufer)<br>
        Laufende offene Ausgaben (Direktlink zur Ineratenanlage)<br>
        Status offener Ausgaben (Seitenauslastung, Umsatz)<br>
        ...
      </div>
      <div class="col-sm-6">
        <h2>Kommunikation</h2>
        Notizen, Erinnerungen<br>
        letzten 5 Verkäufe<br>
        ...
      </div>
    </div>
    -->
  @stop