@section('javascript')
{{ HTML::script('js/index.js') }}
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js') }}
@stop

@section('content')

<div id="code-list" class="col-sm-8 col-sm-offset-2">

</div>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        @foreach ($tags as $tag)
       <a class="btn btn-primary btn-tag" href="{{ route('tags.show', array($tag->id)) }}">{{ $tag->name }} <span class="badge">{{ $tag->codeCount }}</span></a>
        @endforeach
    </div>
</div>

@include('includes.handlebars.code-list')
@stop