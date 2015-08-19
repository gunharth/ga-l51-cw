@extends('app')
@section('pagetitle','Medium')
@section('title','Neues Medium anlegen')

@section('content')
<div class="well">

{!! Form::open([
    'route' => 'medium.store'
]) !!}
    <div class="form-group">
        {!! Form::label('title','Titel',['class' => 'col-xs-2']) !!}
        {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}


<form class="form">
    <div class="form-group">
        {!! Form::label('title','Titel',['class' => 'col-xs-2']) !!}
        {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Medium Titel']) !!}
    </div>
    <div class="form-group">
      <label for="kategorie" class="col-lg-2 control-label">Kategorie</label>
        <select class="form-control" id="kategorie">
          <option>Zielgruppen</option>
          <option>Kundenmagazin</option>
          <option>Kat 3</option>
          <option>Kat 4</option>
          <option>Kat 5</option>
        </select>
    </div>
    <div class="form-group">
    <div class="input-group">
                <div class="input-group-btn">
                    <div class="btn btn-primary btn-file">
                        Cover <input type="file" multiple>
                    </div>
                </div>
                <input type="text" class="form-control" readonly>
            </div>
       </div>  
    <div class="form-group">
        <label for="auflage" class="col-xs-2">Auflage</label>
        <input type="text" class="form-control" id="auflage" placeholder="Auflage" value="10.000" />
    </div>
    <div class="form-group">
        <label for="preis" class="col-xs-2">Verkaufspreis</label>
        <input type="number" class="form-control" id="preis" placeholder="0.00" value="7.50" />
    </div>
    <div class="form-group">
        <label for="vertrieb" class="col-xs-2">Vertrieb</label>
        <input type="text" class="form-control" id="vertrieb" placeholder="Trafiken, etc." value="Trafiken, Abo" />
    </div>
     <div class="form-group">
        <label for="umfang" class="col-xs-2">Umfang</label>
        <input type="text" class="form-control" id="umfang" placeholder="100 Seiten" value="100 Seiten" />
    </div>
    <div class="form-group">
        <label for="notes" class="col-xs-2">Interne Anmerkungen</label>
        <textarea class="form-control" id="notes" placeholder="Anmerkungen ...."></textarea>
    </div>
    
   

<div class="form-group">
        <button type="submit" class="btn btn-primary">Speichern</button> <button type="reset" class="btn btn-default">Abbrechen</button>
</div>
    
</form>
   </div>

<div class="well">
        <p>Dev notes:</p>
        <p>&nbsp;</p>
    </div>
    
  @stop