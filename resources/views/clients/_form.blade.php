<div class="form-group">
    {!! Form::label('firma','Firma',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('firma',null,['class' => 'form-control', 'placeholder' => 'Firma']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('ansprache','Ansprache/Person',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('ansprache',null,['class' => 'form-control', 'placeholder' => 'Ansprache/Person']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('strasse','Straße',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('strasse',null,['class' => 'form-control', 'placeholder' => 'Straße']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('plz','Postleitzahl',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('plz',null,['class' => 'form-control', 'placeholder' => 'Postleitzahl']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('ort','Ort',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('ort',null,['class' => 'form-control', 'placeholder' => 'Ort']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tel','Tel',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('tel',null,['class' => 'form-control', 'placeholder' => 'Telefon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('agent','Agentur',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
          {!! Form::checkbox('agent',1) !!}
        </div>
</div>
<div class="form-group form-inline">
    {!! Form::label('vat_country','UID Nummer',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
          {!! Form::select(
          'vat_country',
          $list = array('ATU' => 'ATU', 'DE' => 'DE'),
          $client->vat,
          ['class' => 'form-control']
          ) !!}
          {!! Form::text('vat_number',null,['class' => 'form-control', 'placeholder' => 'Nummer']) !!}
        </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
    </div>
</div>