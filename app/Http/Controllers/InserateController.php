<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inserat;
use App\Issue;
use App\Format;
use App\User;
use Illuminate\Support\Facades\Auth;

class InserateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $inserate = Inserat::with('user','client','agent','format.issue.medium')->get();
        //dd($inserate);
        $totalPreis = $inserate->sum('preis');
        //dd($productionCosts);
        return view('inserate.index', compact('inserate','totalPreis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
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
        $inserat = new Inserat($request->all());
        Auth::user()->inserate()->save($inserat);

        //$inserat->format()->attach($request->format_id);
        //$inserat->format()->attach(array(3 => ['pr' => 1]));
        foreach($request->format_id as $key => $id) {
            //dd($id);
            //$inserat->format()->attach($id, [array_get($request->pr, $key)]);
            if(isset($request->pr) && is_array($request->pr) && array_key_exists($key, $request->pr)) {
            $inserat->format()->attach(array($id => ['pr' => $request->pr[$key]]));
        } else {
            $inserat->format()->attach(array($id => ['pr' => 0]));
        }
        }

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
        //if($format_id != 0) {
        //$format = new ;
        $format = new Format;
        $format->preis = 0;
        foreach($request->format_id as $f) {
            $for = Format::findOrFail($f);
            $format->preis += $for->preis;
        }
        //$format->preis +=  $request->preisaddinput;
        //$format = Format::findOrFail($format_id);
        //} else {

          //  $format->preis = $request->preisinput;
       // }
        //$format->brutto = 
        $format->rabatt = $request->rabatt;
        $format->provision = $request->provision;
        $format->art = $request->art;
        if($request->preisaddinput > 0) {
            $format->preis = $request->preisaddinput;
        }
        if($request->preisinput > 0) {
            $format->preis = $request->preisinput;
        }
        if($request->nettoinput > 0) {
            $format->nettoinput = $request->nettoinput;
        }
        if($request->bruttoinput > 0) {
            $format->bruttoinput = $request->bruttoinput;
        }

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
