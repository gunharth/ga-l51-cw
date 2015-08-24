@extends('app')

@section('pagetitle','Medium')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Medium</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('medium.create') }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit"></i> Neu</a>
        </div>
    </div>
    <hr  />
    <div class="row">
      @foreach($mediums as $medium)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="{{ route('medium.show', $medium->slug) }}" class="thumbnail">
            <img src="{{ !empty($medium->cover) && file_exists(public_path('uploads/'.$medium->cover) ) ? asset('uploads/'.$medium->cover) : asset('img/placeholder.jpg')  }}">
            <div class="caption">
              <h5>{{ $medium->title }}</h5>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  @stop