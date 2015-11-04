@extends('app')

@section('pagetitle','Neuen Benutzer anlegen')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Neuen Benutzer anlegen</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('users.index') }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
        {!! Form::open([
            'route' => 'users.store',
            'class' => 'form-horizontal'
        ]) !!}
        @include('users._form')
        {!! Form::close() !!}
   </div>
@stop