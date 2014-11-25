<?php

class EditorModes extends Eloquent
{
    protected $table      = 'editor_modes';
    protected $guarded    = array('id');
    protected $fillable   = array('name', 'value');

    public $timestamps = false;
}