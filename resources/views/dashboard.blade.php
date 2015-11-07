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
    <hr />
    <h2>Chart Beispiele</h2>
    <div class="row">
      <div class="col-sm-6">
        <div id="hero-graph" class="graph"></div>
      </div>
      <div class="col-sm-6">
        <div id="hero-bar" class="graph"></div>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-sm-6">
        <div id="hero-area" class="graph"></div>
      </div>
      <div class="col-sm-6">
        <div id="hero-donut" class="graph"></div>
      </div>
    </div>
  @stop