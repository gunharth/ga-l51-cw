<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\Issue;
use App\Format;
use App\User;

//use Carbon\Carbon;

class IssuesController extends Controller
{
    use Traits;

    public function index()
    {
        return 'no page';
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
    public function show(Request $request, $medium_slug, $id)
    {
        /*$issue = Issue::findOrFail($id);
        //$issue->medium = $issue->medium;
        $medium = $issue->medium;
        $issue->formats = $issue->formatsIssue;
        $inserate = $issue->formats.inserate;
        $issue->productionCosts = $issue->getIssueProductionCosts();
        return view('issues.show', compact('issue', 'medium'));*/

       /* $inserat = Inserat::with('user', 'format.issue.medium')->find($id);
        $client = $inserat->client;
        $formatList = $this->listFormats($inserat->issue_id);
        return view('inserate.edit', compact('inserat', 'client', 'formatList'));*/

        \Session::put('backReferrer', $request->url());

        $issue = Issue::with('inserate.client','inserate.format')->find($id);
        //dd($issue->formats;
        //dd($issue->inserate);
        $medium = $issue->medium;
        $inserate = $issue->inserate;
        $inserate->totalInserate = $issue->inserate->count();
        $inserate->totalPreis = $this->moneyFormat($inserate->sum('preis'));
        $inserate->totalNettoRaw = $inserate->sum('netto');
        $inserate->totalNetto = $this->moneyFormat($inserate->sum('netto'));
        $inserate->totalBrutto = $this->moneyFormat($inserate->sum('brutto'));
        $inserate->totalRabatt = $inserate->sum('preis2');
        // Rabatt in %
        $inserate->totalRabattProz = 0;
        $summe = $inserate->sum('preis');
        if($summe > 0) {
        $inserate->totalRabattProz = round(100-($inserate->totalRabatt/$inserate->sum('preis'))*100, 2);
    }
        $inserate->totalFlaeche = 0;
        foreach($issue->inserate as $inserat) {
                foreach($inserat->format as $format) {
                    $inserate->totalFlaeche += $format->flaeche;
                }
        }
        $issue->productionCosts = $issue->getIssueProductionCosts();

        $issue->user = '';
        if($user = User::find($issue->user_id)) {
            $issue->user = $user->name . ' ' . $user->last_name;
        }
        //dd($inserate->formats->toArray());
        /*for ($i = 0; $i < count($issue->inserate->format); $i++) {
            $inserate->totalFlaeche += $issue->inserate->format[$i]->flaeche;
        }*/
        //$inserate->totalFlaeche = $inserate->sum('formats->flaeche');
        //dd($inserate->totalFlaeche);
        /*$inserate = $issue->inserate->with('client');
        dd($inserate);*/
        //$client = $inserat->client;
        //$formatList = $this->listFormats($inserat->issue_id);
        //return view('inserate.edit', compact('inserat', 'client', 'formatList'));
        $issue->formats = $issue->formatsIssue;
        return view('issues.show', compact('issue', 'medium', 'inserate'));

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

        $issue->user = '';
        if($user = User::find($issue->user_id)) {
            $issue->user = $user->name . ' ' . $user->last_name;
        }

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
