@extends('app')

@section('pagetitle', 'Inserate')

@section('content')

    <div class="row vertical-align">
      <div class="col-md-8">
        <h3>Formate</h3>
      </div>
      <div class="col-md-4 text-right">
          <a href="{{ route('inserate.create') }}" alt="Neu" tile="Neu"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="neu"></i></a>
      </div>
    </div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Formate</th>
          <th>Preis</th>
          <th class="text-right">&nbsp;</th>
        </tr>
      </thead>
      @foreach($inserate as $inserat)
        <tr>
          <td>{{ $inserat->title }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @stop