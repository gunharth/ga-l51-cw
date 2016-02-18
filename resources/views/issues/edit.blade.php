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

{!! Form::model($issue,[
        'method' => 'PATCH',
        'route' => ['medium.issues.update', $medium->slug,$issue->id],
        'class' => 'form-horizontal'
    ]) !!}
<div class="row row-flex row-flex-wrap">
  <div class="col-md-6">
    <div class="well">
    
        <h3>Details</h3>
        <hr />
        <div class="form-group">
            {!! Form::label('name','Titel',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Titel']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('redaktionsschluss','Starttermin',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group date">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  {!! Form::text('redaktionsschluss',null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('drucktermin','Drucktermin',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group date">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  {!! Form::text('drucktermin',null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('erscheinungstermin','Erscheinungstermin',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group date">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  {!! Form::text('erscheinungstermin',null,['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('druckerei','Druckerei',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
            {!! Form::text('druckerei',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('vertrieb','Vertrieb',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
            {!! Form::text('vertrieb',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('druckauflage','Druckauflage',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
            {!! Form::text('druckauflage',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('seiten','Anzahl/Seiten',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
            {!! Form::text('seiten',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sollumsatz','Soll/Umsatz',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','sollumsatz',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        
    
   </div>
  </div>
  <div class="col-md-6">
   <div class="well">
        <h3>Produktionskosten</h3>
        <hr />
        <div class="form-group">
            {!! Form::label('basisanbot','Basisanbot für Seiten',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','basisanbot',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('redaktion','Redaktion',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','redaktion',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fotokosten','Fotokosten / Covershooting',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','fotokosten',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('grafik','Grafik und Repro',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','grafik',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lektorat','Lektorat',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','lektorat',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('mehrseiten','Kosten Mehrseiten p.S.',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','mehrseiten',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('druck','Druck',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','druck',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('vertriebkosten','Vertrieb',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','vertriebkosten',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sonderkosten','Sonderkosten',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','sonderkosten',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    
   </div>
  </div>
</div>
{!! Form::close() !!}




    <div class="row vertical-align">
      <div class="col-md-8">
        <h3>Formate</h3>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('medium.issues.formats.create', [$medium->slug, $issue->id]) }}" title="neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
      </div>
    </div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Formate</th>
          <th>Fläche</th>
          <th>Preis</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($issue->formats as $format)
        <tr>
          <td>{{ $format->name }}</td>
          <td>{{ $format->flaeche }}</td>
          <td>{{ $format->preis }}</td>
          <td class="text-right">
            <a href="{{ route('medium.issues.formats.edit', [$medium->slug, $issue->id, $format->id]) }}" title="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['medium.issues.formats.destroy', $medium->slug, $issue->id, $format->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Format löschen" data-message="Wollen Sie '{{ $medium->title }} - {{ $issue->name }} - {{ $format->name }}' wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop