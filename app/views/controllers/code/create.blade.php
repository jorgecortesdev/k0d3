@extends('layouts.master')

@section('javascript')
{{ HTML::script('js/src-min-noconflict/ace.js') }}
{{ HTML::script('js/bootstrap-select.min.js') }}
{{ HTML::script('js/selectize.js') }}
{{ HTML::script('js/script.js') }}
@stop

@section('css')
{{ HTML::style('css/bootstrap-select.min.css') }}
{{ HTML::style('css/selectize.css') }}
{{ HTML::style('css/selectize.bootstrap3.css') }}
@stop

@section('content')

<div class="col-sm-12">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'code', 'id' => 'form')) }}

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div id="editor"></div>
                </div>
                {{ Form::textarea(
                    'script',
                    Input::old('script'),
                    array(
                        'style' => 'display: none',
                        'id' => 'script'
                    )
                )}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text(
                                'name',
                                Input::old('name'),
                                array(
                                    'class'       => 'form-control',
                                    'placeholder' => 'Name'
                                )
                            )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea(
                                'description',
                                Input::old('description'),
                                [
                                    'class'       => 'form-control',
                                    'placeholder' => 'Description',
                                    'size'        => '30x4'
                                ]
                            )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('tags', 'Tags') }}
                            {{ Form::text(
                                'tags',
                                Input::old('tags'),
                                array(
                                    'class'       => 'form-control',
                                    'placeholder' => 'Tags',
                                    'id' => 'tags'
                                )
                            )}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('mode', 'Mode') }}
                            {{ Form::select(
                                'editor_mode_id',
                                array(
                                    'Recently used' => $editor_modes_recently_used,
                                    'All' => $editor_modes
                                ),
                                'php',
                                array(
                                    'class' => 'selectpicker',
                                    'id' => 'selectMode',
                                    'data-live-search' => true
                                )
                            ) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ Form::submit('Save', array('class' => 'btn btn-default center-block')) }}
            </div>
        </div>

        {{ Form::close() }}

</div>

@stop