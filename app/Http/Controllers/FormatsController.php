<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\Issue;
use App\Format;

class FormatsController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($medium_slug,$id)
    {
        $medium = Medium::findBySlug($medium_slug);
        $issue = Issue::findOrFail($id);
        //return($medium);
        //return $medium->id;
        return view('formats.create',compact('issue', 'medium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $medium_id, $issue_id)
    {
        //return $medium_id;
        $this->validate($request, [
            'name' => 'required'
        ]);
        //$request->merge(array('medium_id' => $medium_id));
        $request->merge(array('issue_id' => $issue_id));

        $input = $request->all();
        //$input['medium_id'] = $medium_id;
        $format = Format::create($input);
        //Format::create(['issue_id' => $issue->id, 'name' => 'Sonderformat']);

        \Session::flash('flash_message', trans('messages.create_success'));

        //return redirect()->back();
        //$medium = $input;
        //dd($medium);
        return redirect()->route('medium.issues.edit', [$medium_id,$format->issue_id]);
       // return view('medium.show/$medium->slug',compact('medium'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
