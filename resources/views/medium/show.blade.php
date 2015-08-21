@extends('app')

@section('pagetitle', $medium->title)

@section('content')
    <div class="row vertical-align">
      <div class="col-md-1">
            <img src="{{ empty($medium->cover) ? '/img/placeholder.jpg' : '/uploads/'.$medium->cover }}">
        </div>
        <div class="col-md-9">
          <h1>{{ $medium->title }}</h1>
          <p><strong>{{ $medium->type->title }}</strong></p>
        </div>
        <div class="col-md-2 text-right">
          <div class="btn-group">
              <a href="#" class="btn btn-default">Aktionen</a>
              <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('medium.edit', $medium->id) }}">Bearbeiten</a></li>
                <li><a href="#">Duplizieren</a></li>  
                <li class="divider"></li>
                <li><a href="#">Archivieren</a></li>
                <li><a href="#">Löschen</a></li>
              </ul>
            </div>
        </div>
    </div>
    <hr />

    <div class="row vertical-align">
      <div class="col-md-12"><h2>Formate</h2></div>
    </div>
    <hr />
    
    
    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Format</th>
      <th class="text-right"><div class="btn btn-primary">Neues Format</div></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>2/1 Abfallend</td>
      <td class="text-right"><div class="btn-group">
          <a href="#" class="btn btn-default">Aktionen</a>
          <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="format_edit.html">Bearbeiten</a></li>
              <li><a href="#">Duplizieren</a></li>
              <li class="divider"></li>
              <li><a href="#">Archivieren</a></li>
              <li><a href="#">Löschen</a></li>
              </ul>
      </div></td>
      </tr>
    <tr>
      <td>2</td>
      <td>1/1 Satzspiegel</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="info">
      <td>3</td>
      <td>1/1 Abfallend</td>
      <td>&nbsp;</td>
      </tr>
  </tbody>
</table> 

    
    
    <div class="row vertical-align">
      <div class="col-md-6"><h2>Ausgaben</h2></div>
        <!--<div class="col-md-6 text-right">
          <div class="btn-group">
              <a href="#" class="btn btn-default">Aktionen</a>
              <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="medium_edit.html">Bearbeiten</a></li>
                <li><a href="#">Duplizieren</a></li>
                <li class="divider"></li>
                <li><a href="#">Archivieren</a></li>
                <li><a href="#">Löschen</a></li>
              </ul>
            </div>
        </div>-->
    </div>
    <hr />
    
    
    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Ausgabe</th>
      <th>Erscheinungstermin</th>
      <th class="text-right"><div class="btn btn-primary">Neue Ausgabe</div></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>4/2015</td>
      <td>28.11.2015</td>
      <td class="text-right"><div class="btn-group">
              <a href="#" class="btn btn-default">Aktionen</a>
              <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="ausgabe_edit.html">Bearbeiten</a></li>
                <li><a href="#">Duplizieren</a></li>
                <li class="divider"></li>
                <li><a href="#">Archivieren</a></li>
                <li><a href="#">Löschen</a></li>
              </ul>
            </div></td>
      </tr>
    <tr>
      <td>2</td>
      <td>3/2015</td>
      <td>05.09.2015</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="info">
      <td>3</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="success">
      <td>4</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="danger">
      <td>5</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="warning">
      <td>6</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>&nbsp;</td>
      </tr>
    <tr class="active">
      <td>7</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>&nbsp;</td>
      </tr>
  </tbody>
</table> 

    
    
<div class="well">
  <p>Dev notes: Medium anlegen - atomatisch Sonderformat anlegen</p>
</div>
  @stop