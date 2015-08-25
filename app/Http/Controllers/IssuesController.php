<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\Issue;

class IssuesController extends Controller
{
    
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return 'y';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($medium_slug)
    {
        $medium = Medium::findBySlug($medium_slug);
        //return $medium->id;

        return view('issues.create',compact('medium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $medium_id)
    {
        //return $medium_id;
        $this->validate($request, [
            'name' => 'required'
        ]);
        $request->merge(array('medium_id' => $medium_id));

        $input = $request->all();
        //$input['medium_id'] = $medium_id;

        $issue = Issue::create($input);

        \Session::flash('flash_message', trans('messages.create_success'));

        //return redirect()->back();
        //$medium = $input;
        //dd($medium);
        return redirect()->route('medium.issues.edit', [$issue->medium_id,$issue->id]);
       // return view('medium.show/$medium->slug',compact('medium'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($medium_slug,$id)
    {
        //return 'yoyo';
        //$medium = Medium::findOrFail($id);
        
        $issue = Issue::findOrFail($id);
        $issue->medium = Medium::findBySlug($medium_slug);
        $issue->formats = $issue->formats;
        return view('medium.issues.show',compact('issue'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($medium_slug,$id)
    {
        $issue = Issue::findOrFail($id);
        $issue->medium = $issue->medium;
        $issue->formats = $issue->formats;
        return view('issues.edit',compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $medium_slug, $id)
    {
        
        $issue = Issue::findOrFail($id);

        /*$this->validate($request, [
            'name' => 'required'
        ]);*/
        
        $input = $request->all(); 

        $issue->fill($input)->save();

        \Session::flash('flash_message', trans('messages.create_success'));

        return redirect()->back();
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
