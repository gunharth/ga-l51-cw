<div class="form-group">
    {!! Form::label('name','Vorname',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Vorname']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('last_name','Nachname',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::text('last_name',null,['class' => 'form-control', 'placeholder' => 'Nachname']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email','E-mail',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password','Passwort',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Passwort']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password_confirm','Passwort wiederholen',['class' => 'col-sm-2']) !!}
    <div class="col-sm-10">
    {!! Form::password('password_confirm',['class' => 'form-control', 'placeholder' => 'Passwort wiederholen']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {!! Form::submit('Speichern',['class' => 'btn btn-primary']) !!}
    </div>
</div>