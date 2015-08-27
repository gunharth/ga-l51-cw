<div class="row vertical-align">
      <div class="col-sm-1 col-md-1">
        <img src="{{ !empty($medium->cover) && file_exists(public_path('uploads/'.$medium->cover) ) ? asset('uploads/'.$medium->cover) : asset('img/placeholder.jpg')  }}">
        </div>
        <div class="col-sm-7 col-md-7">
          <h1>{{ $medium->title }}</h1>
          <p><strong>{{ isset($medium->type->title) ? $name : '&nbsp;' }}</strong></p>
        </div>
        <div class="col-sm-4 col-md-4 text-right">
        @if($showactions)
          <a href="{{ route('medium.edit', $medium->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit"></i></a> &nbsp; 
          {!! Form::open([
            'method' => 'DELETE',
            'route' => ['medium.destroy', $medium->id],
            'style' => 'display: inline;'
        ]) !!}
             <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="Medium löschen" data-message="Wollen Sie {{ $medium->title }} wirklich löschen?"><i class="fa fa-lg fa-trash-o"></i></a>
        {!! Form::close() !!}
        @endif
        </div>
    </div>
    <hr />