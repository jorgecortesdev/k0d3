@extends('layouts.master')

@section('javascript')
{{ HTML::script('js/src-min-noconflict/ace.js') }}


<script>
$(document).ready(function() {
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/{{ isset($code['mode']) ? $code['mode'] : 'php' }}");
    editor.getSession().setValue($('#script').val());
});
</script>

@stop

@section('css')
{{ HTML::style('css/bootstrap-select.min.css') }}
@stop

@section('content')
<div class="col-sm-12">
    <form action="/code" role="form" id="form" method="post">
        <div class="row">
            <div class="col-sm-12">
                <h4>{{ isset($code['name']) ? $code['name'] : 'N/A' }} <small>{{ HTML::linkRoute('code.edit', 'Edit', array($code->id), array('class' => 'pull-right')) }}</small>
                </h4>
                <div class="form-group">
                    <div id="editor"></div>
                </div>
                <textarea name="script" rows="15" style="display: none" id="script">{{ isset($code['script']) ? $code['script'] : '' }}</textarea>
                <h5>Description:</h5>
                <p>{{{ isset($code['description']) ? $code['description'] : '' }}}</p>
                <h5>Tags:
                    <div class="inline-headers tag">
                        @foreach ($tags as $tag)
                        <span class="item">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </h5>
            </div>
        </div>
    </form>
</div>

@stop