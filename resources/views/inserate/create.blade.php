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
    <div class="well">
        {!! Form::open([
            'route' => ['inserate.store'],
            'class' => 'form-horizontal'
        ]) !!}
        <div class="form-group">
            {!! Form::label('customer','Kunde',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('customer',null,['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('agent','Agentur',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('agent',null,['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('issue_id','Medium / Ausgabe',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::select(
                'issue_id',
                $issues,
                0,
                ['class' => 'form-control']
                ) !!}
            </div>
        </div>
        
        detaails zu Ausgabe aufscheinen lassen?
        <div class="form-group">
            {!! Form::label('format_id','Format',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::select(
                'format_id',
                $list = array('0' => '-- Auswahl --'),
                0,
                ['class' => 'form-control']
                ) !!}
            </div>
        </div>
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
<label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
<label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
            <label class="radio-inline"><input type="radio" name="type" value="1">PR</label>
            <label class="radio-inline"><input type="radio" name="type" value="2">Gegengeschäft</label>
            <label class="radio-inline"><input type="radio" name="type" value="3">Sonderverrechnung</label>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preis','Preis',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('preis',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('rabatt','Rabatt in %',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::input('number','rabatt',0,['class' => 'form-control', 'step' => '1']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preis2','Preis inkl. Rab.',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('preis2',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('provision','Agenturprovision in %',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('provision',0,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preis3','Preis inkl. AP exkl. WA',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('preis3',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('name','Werbeabgabe',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('name',5,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preis4','Preis inkl. AP inkl. WA',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('preis4',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('ust','Umsatzsteuer',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('ust',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('brutto','Preis Brutto',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('brutto',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
       
        <div class="form-group">
            {!! Form::label('gutschrift',' Gutschrift',['class' => 'col-sm-2']) !!}
            <div class="col-sm-10">
            {!! Form::text('gutschrift',null,['class' => 'form-control', 'disabled' => 'disabled']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
   </div>
  @stop