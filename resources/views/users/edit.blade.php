@extends('app')

@section('pagetitle',$user->last_name . ' Bearbeiten')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>{{ $user->name }} {{ $user->last_name }}</h1></div>
        <div class="col-md-6 text-right">
          <a href="{{ route('users.index') }}" title="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        </div>
    </div>
    <hr  />
    <div class="well">
    {!! Form::model($user,[
        'method' => 'PATCH',
        'route' => ['users.update', $user->id],
        'files' => true,
        'class' => 'form-horizontal'
    ]) !!}
     @include('users._form')
    {!! Form::close() !!}
    </div>
@stop