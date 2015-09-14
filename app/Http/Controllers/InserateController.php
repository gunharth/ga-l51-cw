<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inserat;
use App\Issue;
use App\Format;
use App\User;

class InserateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$inserate = Inserat::orderBy('edited_at', 'ASC')->get();
        //$inserate = Inserat::all();
        /*foreach($inserate as $inserat) {
            $inserate->user = $inserat->user;
        }*/

        //dd($inserate);
        //return Inserat::with('User','format.issue.medium')->get();
        $inserate = Inserat::with('User','format.issue.medium')->get();
        return view('inserate.index', compact('inserate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$issues = Issue::all();
       // $types = [0=>'Kategorie'] + MediumType::lists('title','id')->toArray();
        $issues = [0=>'-- Auswahl --'] + Issue::get()->lists('select_box','id')->toArray();
        return view('inserate.create',compact('issues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->merge(array('user_id' => '1'));
        $input = $request->all();
        //$input->user_id = 1;
        $inserat = Inserat::create($input);

        \Session::flash('flash_message', trans('messages.create_success'));
        return redirect()->route('inserate.index');
       
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

    public function calculateTotals(Request $request, $format_id) {
        //return $request->rabatt;
        $format = Format::findOrFail($format_id);
        //$format->brutto = 
        $format->rabatt = $request->rabatt;
        $format->provision = $request->provision;
        /*if($rabatt > 0) {
            $rabattvalue = round(($format->preis/100)*$format->rabatt,2);
            $format
        }*/
        $format->totals = $format->calculateCosts();
       // $format->rabatt = $rabatt;
        //$formats = $issue->formats;
        return $format;
    }

}
