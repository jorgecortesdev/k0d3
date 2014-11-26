@extends('layouts.master')

@section('content')

<div id="code-list" class="col-sm-8 col-sm-offset-2">
    <h3>{{ $tag->name }}</h3>
    <ul class="list-group">
        @foreach ($tag->code as $code)
        <li class="list-group-item"><a href="/code/{{ $code->id }}">{{ $code->name }}</a></li>
        @endforeach
    </ul>
</div>

@stop