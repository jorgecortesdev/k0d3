@extends('layouts.master')

@section('content')
<div class="col-sm-12">
    <form action="/tags" role="form" id="form" method="post">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ isset($tag['name']) ? $tag['name'] : '' }}">
                                <input type="hidden" name="id" value="{{ isset($tag['id']) ? $tag['id'] : 0 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4>
            @foreach ($all_tags as $tag)
            <a href="/tags/{{ $tag->id }}/edit"><span class="label label-default">{{ $tag->name }}</span></a>
            @endforeach
            </h4>
        </div>
    </div>
    </form>
</div>

@stop