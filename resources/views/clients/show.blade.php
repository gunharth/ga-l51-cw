@extends('app')
@section('pagetitle',$client->name . ' Bearbeiten')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>{{ $client->name }}</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('clients.index') }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
          &nbsp; 
          <a href="{{ route('clients.edit', $client->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
          &nbsp; 
          {!! Form::open([
            'method' => 'DELETE',
            'route' => ['clients.destroy', $client->id],
            'style' => 'display: inline;'
          ]) !!}
             <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="client löschen" data-message="Wollen Sie {{ $client->title }} wirklich löschen?"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
          {!! Form::close() !!}
        </div>
    </div>
    <hr  />
    
    

<div class="well">
        
   </div>
  @stop