@extends('app')

@section('title','Medium')

@section('content')
    <h1>Medium</h1>
    <div class="row">
      @foreach($mediums as $medium)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="{{ route('medium.show', $medium->id) }}" class="thumbnail">
            <img src="img/RUNN_COVER_2015_02-723x1024.jpg">
            <div class="caption">
              <h3>{{ $medium->title }}</h3>
            </div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="well">
        <p>Dev notes:</p>
        <p>&nbsp;</p>
    </div>
  @stop