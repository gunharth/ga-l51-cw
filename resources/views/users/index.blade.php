@extends('app')

@section('pagetitle','Benutzer')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Benutzer</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('users.create') }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
        </div>
    </div>
    <hr  />
    <div class="row">
      

    <table class="table table-striped table-hover table-condensed table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($users as $user)
        <tr data-href="{{ route('users.show', $user->id) }}">
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }} {{ $user->last_name }}</td>
          <td class="text-right">
            <a href="{{ route('users.edit', $user->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
            &nbsp;
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['users.destroy', $user->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Kunde löschen" data-message="Wollen Sie {{ $user->name }} wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  @stop