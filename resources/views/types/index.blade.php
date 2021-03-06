@extends('app')

@section('pagetitle','Medium')

@section('content')
    <div class="row vertical-align">
      <div class="col-md-6"><h1>Kategorie</h1></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('types.create') }}" title="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neues Medium anlegen"></i> Neu</a>
        </div>
    </div>
    <hr  />
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Titel</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($types as $type)
        <tr>
          <td>{{ $type->title }}</td>
          <td class="text-right">
            <a href="{{ route('types.edit', $type->id) }}" title="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['types.destroy', $type->id],
                'style' => 'display: inline;'
            ]) !!}
                 <a href="#" data-toggle="modal" data-target="#confirmDelete" data-title="Kategorie löschen" data-message="Wollen Sie "{{ $type->title }}"" wirklich löschen?" data-action="Löschen"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
            {!! Form::close() !!}
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>


  @stop