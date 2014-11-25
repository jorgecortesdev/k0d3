<?php

class CodeController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Code::take(5)->orderBy('created_at', 'DESC')->get(['id', 'name']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $editor_modes = EditorModes::lists('name', 'id');
        $editor_modes_recently_used = EditorModes::take(5)->orderBy('used_on', 'DESC')->lists('name', 'id');

        return View::make(
            'controllers.code.create',
            array(
                'tab'                        => 'add',
                'editor_modes'               => $editor_modes,
                'editor_modes_recently_used' => $editor_modes_recently_used
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $code = Code::create($input);

        $tag_ids = explode(',', Input::get('tags', ''));
        foreach ($tag_ids as $tag_id) {
            $code->tags()->attach($tag_id);
        }

        $editor_mode = EditorModes::find(Input::get('editor_mode_id'));
        $editor_mode->used_on = date('Y-m-d H:i:s');
        $editor_mode->save();

        return Redirect::to('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $code = Code::find($id);

        $tags = $code->tags()->get(['tags.name']);

        return View::make(
            'controllers.code.show',
            array(
                'tab'  => 'add',
                'code' => $code,
                'tags' => $tags
            )
        );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $code = Code::find($id);

        $tags = $code->tags()->get(['tags.id', 'tags.name']);
        $tags = $tags->toJson();

        $editor_modes = EditorModes::lists('name', 'id');
        $editor_modes_recently_used = EditorModes::take(5)->orderBy('used_on', 'DESC')->lists('name', 'id');

        return View::make(
            'controllers.code.edit',
            array(
                'tab'  => 'add',
                'code' => $code,
                'tags' => $tags,
                'editor_modes'               => $editor_modes,
                'editor_modes_recently_used' => $editor_modes_recently_used
            )
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'name'   => 'required',
            'script' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('code/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $code = Code::find($id);
            $code->update(Input::all());
            $tag_ids = explode(',', Input::get('tags', ''));
            if (!empty($tag_ids)) {
                $code->tags()->sync($tag_ids);
            }

            Session::flash('message', 'Successfully updated code!');
            return Redirect::to('code/' . $id);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
