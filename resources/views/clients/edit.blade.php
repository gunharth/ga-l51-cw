@extends('app')

@section('pagetitle',$client->firma . ' Bearbeiten')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>{{ $client->firma }}</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('clients.index') }}" title="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
    {!! Form::model($client,[
        'method' => 'PATCH',
        'route' => ['clients.update', $client->id],
        'files' => true,
        'class' => 'form-horizontal'
    ]) !!}
     @include('clients._form')
    {!! Form::close() !!}
    </div>
@stop