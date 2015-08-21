@extends('app')

@section('pagetitle','Medium')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Medium</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('medium.create') }}" class="btn btn-primary">Neu</a>
        </div>
    </div>
    <hr  />
    <div class="row">
      @foreach($mediums as $medium)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="{{ route('medium.show', $medium->slug) }}" class="thumbnail">
            <img src="{{ empty($medium->cover) ? 'img/placeholder.jpg' : 'uploads/'.$medium->cover }}">
            <div class="caption">
              <h4>{{ $medium->title }}</h4>
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