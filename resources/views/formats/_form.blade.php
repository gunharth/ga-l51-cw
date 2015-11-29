<div class="form-group">
    {!! Form::label('name','Titel',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Format Titel']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('flaeche','Fläche',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
        <div class="input-group addon">
            <span class="input-group-addon">,</span>
            {!! Form::input('number','flaeche',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0,00']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('preis','Preis',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
        <div class="input-group addon">
            <span class="input-group-addon">€</span>
            {!! Form::input('number','preis',null,['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'placeholder' => '0000,00']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('type','Produktionskosten',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
          {!! Form::checkbox('type',2) !!}
        </div>
</div>
<div class="form-group">
    {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
</div>