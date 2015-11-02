<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MediumType;

class MediumTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types = MediumType::orderBy('title', 'ASC')->get();
        //return $mediums; JSON return
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $input = $request->all();
        $type = MediumType::create($input);
        \Session::flash('flash_message', trans('messages.create_success'));
        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $type = MediumType::findOrFail($id);
        return view('types.edit',compact('type'));
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
        $type = MediumType::findOrFail($id);

        $this->validate($request, [
            'title' => 'required'
        ]);
        
        $input = $request->all(); 

        $type->fill($input)->save();

        \Session::flash('flash_message', trans('messages.create_success'));

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $type = MediumType::findOrFail($id);
        $type->delete();
        \Session::flash('flash_message', trans('messages.destroy_success'));
        return redirect()->route('types.index');
    }
}
