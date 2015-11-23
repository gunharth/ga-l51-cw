@extends('app')

@section('pagetitle','Neuen Kunden anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neuen Kunden anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('clients.index') }}" title="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'clients.store',
            'class' => 'form-horizontal'
        ]) !!}
        @include('clients._form')
        {!! Form::close() !!}
   </div>
@stop