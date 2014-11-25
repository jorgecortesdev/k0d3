<?php

class Tag extends Eloquent
{
    protected $table    = 'tags';
    protected $guarded  = array('id');
    protected $fillable = array('name');
    protected $hidden   = array('pivot');

    public function code()
    {
        return $this->belongsToMany('Code', 'code_tags', 'tag_id', 'code_id');
    }

    public function codeCount()
    {
        return $this->belongsToMany('Code', 'code_tags', 'tag_id', 'code_id')
            ->selectRaw('count(tag_id) as aggregate')
            ->groupBy('pivot_tag_id');
    }

    public function getCodeCountAttribute()
    {
        if (!array_key_exists('codeCount', $this->relations)) {
            $this->load('codeCount');
        }

        $related = $this->getRelation('codeCount')->first();

        return ($related) ? $related->aggregate : 0;
    }
}