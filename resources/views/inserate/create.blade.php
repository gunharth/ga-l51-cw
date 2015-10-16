@extends('app')

@section('pagetitle','Neues Inserat anlegen')

@section('content')

  <div class="row vertical-align">
    <div class="col-md-6"><h1>Neues Inserat anlegen</h1></div>
      <div class="col-md-6 text-right">
        <a href="{{ route('inserate.index') }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
      </div>
    </div>
    <hr  />
    {!! Form::open([
      'route' => ['inserate.store'],
      'class' => 'form-horizontal'
    ]) !!}
    <input id="type" type="hidden" name="type">
    
    <!-- clients -->
    <div class="row">
      <div class="col-md-6">
        <div class="well">
          <div class="form-group">
              {!! Form::label('client','Kunde',['class' => 'col-sm-4']) !!}
              <div class="col-sm-8">
              {!! Form::text('client',null,['class' => 'form-control ui-autocomplete-input clientAutoComplete', 'placeholder' => 'Kunde']) !!}
              </div>
              <input type="hidden" name="client_id" id="client_id" value="1">
          </div>
          <div class="form-group">
              {!! Form::label('agent','Agentur',['class' => 'col-sm-4']) !!}
              <div class="col-md-8">
              {!! Form::text('agent',null,['class' => 'form-control ui-autocomplete-input clientAutoComplete', 'placeholder' => 'Agentur']) !!}
              </div>
              <input type="hidden" name="agent_id" id="agent_id" value="2">
          </div>
       </div>
        </div>
         <div class="col-md-6">
          <div class="well">
            <div id="clientDetails"></div>
            <hr>
            <div id="agentDetails"></div>
          </div>
        </div>
    </div>

    <!-- inserate -->
    <div class="row">
      <div class="col-md-6">
        <div class="well">
          <div class="form-group">
              <!--{!! Form::label('issue_id','Medium / Ausgabe',['class' => 'col-sm-4']) !!}
              <div class="col-sm-8">
              {!! Form::select(
                  'issue_id',
                  $issues,
                  0,
                  ['class' => 'form-control']
                  ) !!}
              </div>-->
              {!! Form::label('issue','Medium / Ausgabe',['class' => 'col-sm-4']) !!}
              <div class="col-md-8">
              {!! Form::text('issue',null,['class' => 'form-control ui-autocomplete-input mediumAutoComplete', 'placeholder' => 'Medium / Ausgabe']) !!}
              </div>
              <input type="hidden" name="issue_id" id="issue_id">
          </div>
          <div class="form-group vertical-align">
              {!! Form::label('format_id','Format',['class' => 'col-sm-4']) !!}
              <div class="col-md-5">
              {!! Form::select(
                  'format_id',
                  $list = array('0' => '-- Auswahl --'),
                  0,
                  ['class' => 'form-control', 'disabled' => 'disabled']
                  ) !!}
              </div>
              <div class="col-md-2">
                <label class="checkbox-inline">
                  <input name="pr" type="checkbox" value="1" disabled="disabled" class="manual-input"> PR
                </label>
              </div>
              <div class="col-md-1">
              <a href="#" alt="Format hinzufügen" tile="Format hinzufügen" id="addFormat"><i class="fa fa fa-plus" data-toggle="tooltip" data-original-title="Format hinzufügen"></i></a> 
              </div>
        </div>
       </div>


        </div>
         <div class="col-md-6">
                <div class="well" id="issueDetails"></div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="well">
        
        <div class="form-group">
            {!! Form::label('art','Art',['class' => 'col-sm-4']) !!}
            <div class="col-sm-8 input-group addon">
                <label class="radio-inline">
                  <input name="art" type="radio" value="0" checked="cheked" disabled="disabled" class="manual-input"> Auftrag &nbsp; &nbsp;
                </label>
                <label class="radio-inline">
                  <input name="art" type="radio" value="1" disabled="disabled"class="manual-input"> GG &nbsp; &nbsp;
                </label>
                
               
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preisinput','Zielpreis',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','preisinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('rabatt','Rabatt',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">%</span>
                {!! Form::input('number','rabatt',null,['class' => 'form-control manual-input', 'min' => '0', 'step' => '1', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('provision','Agenturprovision',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">%</span>
                {!! Form::input('number','provision',null,['class' => 'form-control manual-input', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nettoinput','Zielpreis Netto',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','nettoinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('bruttoinput','Zielpreis Brutto',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">€</span>
                {!! Form::input('number','bruttoinput',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('strecke','Strecke/Fläche',['class' => 'col-sm-4']) !!}
            <div class="col-md-8 input-group addon">
                <span class="input-group-addon">,</span>
                {!! Form::input('number','strecke',null,['class' => 'form-control manual-input', 'step' => '0.01', 'min' => '0', 'placeholder' => '0', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-4 col-md-8">
            <a class="btn btn-primary" href="#" role="button" id="reCalculate">Berechnen</a>
          </div>
        </div>
        
    </div>
        </div>

         <div class="col-md-6">
            <div class="well">
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('preis','Preis',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','preis',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('preis2','Preis inkl. Rab.',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','preis2',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        {!! Form::input('number','wert_rabatt',0,['id' => 'wert_rabatt', 'class' => 'form-control input-sm', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('preis3','Preis inkl. AP',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','preis3',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        {!! Form::input('number','wert_provision',0,['id' => 'wert_provision', 'class' => 'form-control input-sm', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('netto','Preis Netto',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','netto',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('preis4','Preis inkl. WA',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','preis4',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        {!! Form::input('number','wert_werbeabgabe',0,['id' => 'wert_werbeabgabe', 'class' => 'form-control input-sm', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-xs-9">
                        <div class="form-group">
                            {!! Form::label('brutto','Preis Brutto',['class' => 'col-xs-4']) !!}
                            <div class="col-xs-8 input-group addon">
                                <span class="input-group-addon">€</span>
                                {!! Form::input('number','brutto',0,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        {!! Form::input('number','ust',0,['id' => 'ust', 'class' => 'form-control input-sm', 'step' => '0.01', 'min' => '0', 'readonly' => 'readonly']) !!}
                    </div>
                </div>

                <div class="form-group">
            {!! Form::label('notiz','Notizen',['class' => 'col-sm-3']) !!}
            <div class="col-md-9">
                {!! Form::textarea('notiz',null,['class' => 'form-control manual-input', 'rows' => '2', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-md-9">
            {!! Form::submit('Speichern',['class' => 'btn btn-success manual-input', 'disabled' => 'disabled']) !!}
            </div>
        </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
  @stop