<?php

class TagsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = e(Input::get('q', ''));

        if(!$query && $query == '') {
            return Response::json(array(), 400);
        }

        $tags = Tag::where('name', 'like', '%' . $query . '%')
            ->orderBy('name', 'asc')
            ->take(5)
            ->get(array('id', 'name'))->toArray();

        $response = array(
            'data' => $tags
        );

        return $response;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $all_tags = Tag::all();
        return View::make(
            'controllers.tags.create',
            array(
                'tab' => 'add-tag',
                'all_tags' => $all_tags
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
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tags/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $input = Input::all();
            $tag = Tag::create($input);
            Session::flash('message', 'Successfully created tag!');
            return Redirect::to('tags/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $all_tags = Tag::all();
        return View::make(
            'controllers.tags.edit',
                array(
                'tab'       => 'add-tag',
                'tag'       => $tag,
                'all_tags'  => $all_tags
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
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tags/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tag = Tag::find($id);
            $tag->update(Input::only('name'));

            Session::flash('message', 'Successfully updated tag!');
            return Redirect::to('tags/create');
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
