@extends('app')

@section('title','Dashboard')

@section('content')
	<div class="row vertical-align">
        <div class="col-md-12 text-right">
          <div class="btn-group">
              <a href="#" class="btn btn-default">Aktionen</a>
              <a aria-expanded="false" href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Duplizieren</a></li>  
                <li class="divider"></li>
                <li><a href="#">Archivieren</a></li>
                <li><a href="#">Löschen</a></li>
              </ul>
            </div>
        </div>
    </div>
    <hr />

    

    <div class="well">
        <p>Dev notes: yoyo</p>
        <p>&nbsp;</p>
    </div>
  @stop