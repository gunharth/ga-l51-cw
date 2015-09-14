<div class="row vertical-align">
      <div class="col-sm-1 col-md-1">
        <a href="{{ route('medium.show', $medium->slug) }}"><img src="{{ !empty($medium->cover) && file_exists(public_path('uploads/'.$medium->cover) ) ? asset('uploads/'.$medium->cover) : asset('img/placeholder.jpg')  }}"></a>
        </div>
        <div class="col-sm-7 col-md-7">
          <h1>{{ $medium->title }} <small>{{ $subtitle }}</small></h1>
          <p><strong>{{ isset($medium->type->title) ? $medium->type->title : '&nbsp;' }}</strong></p>
        </div>
        <div class="col-sm-4 col-md-4 text-right">
        @if($showactions)
          <a href="{{ route('medium.index') }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
          &nbsp; 
          <a href="{{ route('medium.edit', $medium->id) }}" alt="Bearbeiten" tile="bearbeiten"><i class="fa fa-lg fa-edit" data-toggle="tooltip" data-original-title="bearbeiten"></i></a> 
          &nbsp; 
          {!! Form::open([
            'method' => 'DELETE',
            'route' => ['medium.destroy', $medium->id],
            'style' => 'display: inline;'
          ]) !!}
             <a href="#" class="" data-toggle="modal" data-target="#confirmDelete" data-title="Medium löschen" data-message="Wollen Sie {{ $medium->title }} wirklich löschen?"><i class="fa fa-lg fa-trash-o" data-toggle="tooltip" data-original-title="löschen"></i></a>
          {!! Form::close() !!}
        @endif
        @if($backbutton)
          <a href="{{ route($backroute,$backrouteid) }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        @endif
        @if($prevbutton)
          <a href="{{ URL::previous() }}" alt="Zurück" tile="zurück"><i class="fa fa-lg fa-arrow-left" data-toggle="tooltip" data-original-title="zurück"></i></a> 
        @endif
        </div>
    </div>
    <hr />