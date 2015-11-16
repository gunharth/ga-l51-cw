@extends('app')

@section('pagetitle','Neues Inserat anlegen')

@section('content')

<div class="row vertical-align">
  <div class="col-md-6"><h1>Neues Inserat anlegen</h1></div>
  <div class="col-md-6 text-right">
    <a href="{{ route('inserate.index') }}" title="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
  </div>
</div>
<hr  />
{!! Form::open([
  'id' => 'inserat',
  'route' => ['inserate.store'],
  'class' => 'form-horizontal'
]) !!}

<!-- clients -->
<div class="row row-flex row-flex-wrap">
  <div class="col-md-6">
    <div class="well">
      <div class="form-group">
          {!! Form::label('client','Kunde',['class' => 'col-sm-4']) !!}
          <div class="col-sm-8">
          {!! Form::text('client',null,['class' => 'form-control ui-autocomplete-input clientAutoComplete', 'placeholder' => 'Kunde']) !!}
          </div>
          <input type="hidden" name="client_id" id="client_id">
      </div>
   </div>
  </div>
  <div class="col-md-6">
    <div class="well">
      <div id="clientDetails"></div>
    </div>
  </div>
</div>

<!-- inserate -->
<div class="row row-flex row-flex-wrap">
  <div class="col-md-6">
    <div class="well">
      <div class="form-group">
        {!! Form::label('issue','Medium / Ausgabe',['class' => 'col-sm-4']) !!}
        <div class="col-md-8">
        {!! Form::text('issue',null,['class' => 'form-control ui-autocomplete-input mediumAutoComplete', 'placeholder' => 'Medium / Ausgabe']) !!}
        </div>
        <input type="hidden" name="issue_id" id="issue_id">
      </div>
      <hr>
      <div id="formats-outer">
        <div class="form-group vertical-align">
          {!! Form::label('format_id','Format',['class' => 'col-sm-4']) !!}
          <div class="col-md-5">
          {!! Form::select(
              'format_id[]',
              $list = array('0' => '-- Auswahl --'),
              0,
              ['class' => 'form-control format_id', 'disabled' => 'disabled']
              ) !!}
          </div>
          <div class="col-md-2">
            <label class="checkbox-inline">
              <input name="pr[0]" type="checkbox" value="1" disabled="disabled" class="manual-input"> PR
            </label>
          </div>
          <div class="col-md-1">
            <a href="#" alt="Format hinzufügen" title="Format hinzufügen" class="addFormat"><i class="fa fa fa-plus" data-toggle="tooltip" data-original-title="Format hinzufügen"></i></a> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="well">
      <div id="issueDetails"></div>
      <hr>
      <div class="form-group">
        {!! Form::label('sujet','Kunde/Sujet',['class' => 'col-sm-3']) !!}
        <div class="col-md-9">
            {!! Form::text('sujet',null,['class' => 'form-control manual-input']) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('auftragsnummer','Auftrag/Nr.',['class' => 'col-sm-3']) !!}
        <div class="col-md-9">
            {!! Form::text('auftragsnummer',null,['class' => 'form-control manual-input']) !!}
        </div>
      </div>
      <hr>
      <div class="form-group">
        {!! Form::label('art','Art',['class' => 'col-sm-3']) !!}
        <div class="col-md-9">
          <div class="input-group">
            <label class="radio-inline">
              <input name="art" type="radio" value="0" checked="checked" disabled="disabled" class="manual-input"> Auftrag &nbsp; &nbsp;
            </label>
            <label class="radio-inline">
              <input name="art" type="radio" value="1" disabled="disabled"class="manual-input"> GG &nbsp; &nbsp;
            </label>
          </div>
        </div>
      </div>
    </div>      
  </div>
</div>

<!-- Calculations -->
<div class="row row-flex row-flex-wrap">
  <div class="col-sm-4">
    <div class="well">
      <div class="form-group">
          {!! Form::label('preisaddinput','Aufpreis',['class' => 'col-sm-6']) !!}
          <div class="col-md-6 input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','preisaddinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <div class="form-group">
          {!! Form::label('preisinput','Zielpreis inkl. Rab',['class' => 'col-sm-6']) !!}
          <div class="col-md-6 input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','preisinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <div class="form-group">
          {!! Form::label('rabatt','Rabatt',['class' => 'col-sm-6']) !!}
          <div class="col-sm-6 input-group addon">
              <span class="input-group-addon">%</span>
              {!! Form::input('number','rabatt',null,['class' => 'form-control manual-input', 'min' => '0', 'max' => '30', 'step' => '1', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <div class="form-group">
          {!! Form::label('provision','Agenturprovision',['class' => 'col-sm-6']) !!}
          <div class="col-sm-6 input-group addon">
              <span class="input-group-addon">%</span>
              {!! Form::input('number','provision',null,['class' => 'form-control manual-input', 'min' => '0', 'max' => '30', 'step' => '1', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <div class="form-group">
          {!! Form::label('nettoinput','Zielpreis Netto',['class' => 'col-sm-6']) !!}
          <div class="col-sm-6 input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','nettoinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <!--<div class="form-group">
          {!! Form::label('bruttoinput','Zielpreis Brutto',['class' => 'col-sm-6']) !!}
          <div class="col-sm-6 input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','bruttoinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>-->
      <div class="form-group">
          {!! Form::label('strecke','Strecke/Fläche',['class' => 'col-sm-6']) !!}
          <div class="col-sm-6 input-group addon">
              <span class="input-group-addon">,</span>
              {!! Form::input('number','strecke',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
          </div>
      </div>
      <div class="row">
        <div class="col-sm-offset-6 col-sm-6">
          <a class="btn btn-primary" href="#" role="button" id="reCalculate">Berechnen</a>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Results -->
  <div class="col-sm-8">
    <div class="well">

      <!-- Preis -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
              {!! Form::label('preis','Preis',['class' => 'col-sm-6']) !!}
              <div class="input-group addon">
                  <span class="input-group-addon">€</span>
                  {!! Form::input('number','preis',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
              </div>
          </div>
        </div>
      </div>
      
      <!-- Preis inkl. Rab. -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('preis2','Preis inkl. Rab.',['class' => 'col-sm-6']) !!}
            <div class="input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','preis2',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">%</span>
              {!! Form::input('number','wert_rabatt_proz',null,['id' => 'wert_rabatt_proz', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">€</span>
            {!! Form::input('number','wert_rabatt',null,['id' => 'wert_rabatt', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
      </div>
      
      <!-- Preis inkl. AP. -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('preis3','Preis inkl. AP',['class' => 'col-sm-6']) !!}
            <div class="input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','preis3',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">%</span>
              {!! Form::input('number','wert_provision_proz',null,['id' => 'wert_provision_proz', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">€</span>
            {!! Form::input('number','wert_provision',null,['id' => 'wert_provision', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
        </div>
      </div>
      
      <!-- Preis Netto -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('netto','Preis Netto',['class' => 'col-sm-6']) !!}
            <div class="input-group addon">
              <span class="input-group-addon">€</span>
              {!! Form::input('number','netto',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
          </div>
        </div>
      </div>

      <!-- Preis inkl. WA -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
                {!! Form::label('preis4','Preis inkl. WA',['class' => 'col-sm-6']) !!}
                <div class="input-group addon">
                    <span class="input-group-addon">€</span>
                    {!! Form::input('number','preis4',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">%</span>
              {!! Form::input('number','wert_wa_proz',null,['id' => 'wert_wa_proz', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">€</span>
            {!! Form::input('number','wert_werbeabgabe',null,['id' => 'wert_werbeabgabe', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
      </div>
      
      <!-- Preis Brutto -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            {!! Form::label('brutto','Preis Brutto',['class' => 'col-sm-6']) !!}
            <div class="input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','brutto',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">%</span>
              {!! Form::input('number','wert_ust_proz',null,['id' => 'wert_ust_proz', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group addon">
            <span class="input-group-addon">€</span>
            {!! Form::input('number','ust',null,['id' => 'ust', 'class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
            </div>
        </div>
      </div>
      
      <div class="form-group">
        {!! Form::label('notes','Notizen',['class' => 'col-sm-3']) !!}
        <div class="col-sm-9">
            {!! Form::textarea('notes',null,['class' => 'form-control manual-input', 'rows' => '2', 'disabled' => 'disabled']) !!}
      </div>
      </div>
      <div class="row">
        
          <a class="btn btn-success pull-right disabled" href="#" role="button" id="inseratSubmit">Speichern</a>
        
      </div> 
    </div>
  </div>
</div>
{!! Form::close() !!}
@stop