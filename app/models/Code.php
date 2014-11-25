<?php

class Code extends Eloquent
{
    protected $table    = 'code';
    protected $guarded  = array('id');
    protected $fillable = array('name', 'script', 'description', 'editor_mode_id');
    protected $hidden   = array('pivot');

    public function tags()
    {
        return $this->belongsToMany('Tag', 'code_tags', 'code_id', 'tag_id');
    }
}