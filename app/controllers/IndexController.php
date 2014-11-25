<?php

class IndexController extends BaseController
{
    protected $layout = 'layouts.master';

    public function index()
    {
        $tags = Tag::with('codeCount')->get(['id', 'name']);

        $this->layout->content = View::make(
            'controllers.index.index',
            [
                'tags' => $tags
            ]
        );
    }
}