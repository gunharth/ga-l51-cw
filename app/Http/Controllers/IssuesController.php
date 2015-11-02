<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\Issue;
use App\Format;

//use Carbon\Carbon;

class IssuesController extends Controller
{
    use Traits;

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

        return view('issues.create', compact('medium'));
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
        //$input->redaktionsschluss = Carbon\Carbon::createFromFormat('Y-m-d', $input->redaktionsschluss);
        $issue = Issue::create($input);
        Format::create(['issue_id' => $issue->id, 'name' => 'Strecke', 'type' => '0', 'art' => '1']);
        Format::create(['issue_id' => $issue->id, 'name' => 'Sonderverrechnung', 'type' => '1', 'art' => '0']);

        \Session::flash('flash_message', trans('messages.create_success'));

        //return redirect()->back();
        //$medium = $input;
        //dd($medium);
        return redirect()->route('medium.issues.edit', [$issue->medium_id, $issue->id]);
       // return view('medium.show/$medium->slug',compact('medium'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($medium_slug, $id)
    {
        $issue = Issue::findOrFail($id);
        //$issue->medium = $issue->medium;
        $medium = $issue->medium;
        $issue->formats = $issue->formatsIssue;
        $issue->productionCosts = $issue->getIssueProductionCosts();
        return view('issues.show', compact('issue', 'medium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($medium_slug, $id)
    {
        $issue = Issue::findOrFail($id);
        //$issue = Issue::find($id)->formats->where('type',0)->where('art',0);
        $medium = $issue->medium;
        $issue->formats = $issue->formatsIssue;
        return view('issues.edit', compact('issue', 'medium'));
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
    public function destroy($medium_slug, $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        \Session::flash('flash_message', trans('messages.destroy_success'));
        return redirect()->route('medium.show', $medium_slug);
    }


    /*public function listFormats($id)
    {
        $issue = Issue::findOrFail($id);
        $formats = $issue->formats;
        //$formats = [0=>'-- Auswahl --'] + $issue->formats->toArray();
        return $formats;
    }*/


    public function showDetails($id)
    {
        $issue = Issue::findOrFail($id);
        $medium = $issue->medium;
        //return $client;
        return view('issues.partials.details', compact('issue', 'medium'));
    }

    public function replicate($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->name = $issue->name . ' Kopie';
        $clone = $issue->replicate();
        $clone->save();

        if ($issue->formats->count() > 0)
{
    $formats_array = [];

    foreach ($issue->formats as $format) {
        $format_copy = $format->replicate();
        $format_copy->issue_id = $clone->id;
        array_push($formats_array, $format_copy);
    }

    $clone->formats()->saveMany($formats_array);
}

        
        
        
        return redirect()->back();
    }
}
