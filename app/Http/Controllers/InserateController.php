<?php

namespace App\Http\Controllers;

use PDF;
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
    use Traits;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $inserate = Inserat::with('user', 'client', 'format.issue.medium')->get();
        $inserate->totalInserate = $inserate->count();
        $inserate->totalPreis = $this->moneyFormat($inserate->sum('preis'));
        $inserate->totalNetto = $this->moneyFormat($inserate->sum('netto'));
        $inserate->totalBrutto = $this->moneyFormat($inserate->sum('brutto'));
        $inserate->totalRabatt = $inserate->sum('preis2');
        // Rabatt in %
        $inserate->totalRabattProz = round(100-($inserate->totalRabatt/$inserate->sum('preis'))*100, 2);
        $inserate->totalFlaeche = $inserate->sum('strecke');
        foreach ($inserate as $inserat) {
            foreach ($inserat->format as $format) {
                $inserate->totalFlaeche += $format->flaeche;
            }
        }

        \Session::flash('backUrl', $request->url());

        return view('inserate.index', compact('inserate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inserate.create');
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
            'client_id' => 'required',
            'issue_id' => 'required',
            'format_id' => 'min:1'
        ]);
        $inserat = new Inserat($request->all());
        Auth::user()->inserate()->save($inserat);
        foreach ($request->format_id as $key => $id) {
            if (isset($request->pr) && array_key_exists($key, $request->pr)) {
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

    public function printInvoice($id)
    {
        //$pdf = PDF::loadView('pdf.invoice', $data);
        $inserat = Inserat::with('client', 'format.issue.medium')->find($id);
        //$inserat->client = $inserat->client;
        $pdf = PDF::loadView('pdf.invoice', compact('inserat'));
        return $pdf->download('invoice.pdf');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $inserat = Inserat::with('user', 'format.issue.medium')->find($id);
        $client = $inserat->client;
        $formatList = $this->listFormats($inserat->issue_id);

        if (\Session::has('backUrl')) {
            \Session::keep('backUrl');
        }
        return view('inserate.edit', compact('inserat', 'client', 'formatList'));
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
        $inserat = Inserat::findOrFail($id);

        $this->validate($request, [
            'client_id' => 'required',
            'issue_id' => 'required',
            'format_id' => 'min:1'
        ]);
        
        $input = $request->all();

        $inserat->fill($input)->save();

        $inserat->format()->detach();
        foreach ($request->format_id as $key => $id) {
            if (isset($request->pr) && array_key_exists($key, $request->pr)) {
                $inserat->format()->attach(array($id => ['pr' => $request->pr[$key]]));
            } else {
                $inserat->format()->attach(array($id => ['pr' => 0]));
            }
        }
        
        \Session::flash('flash_message', trans('messages.create_success'));
        return ($url = \Session::get('backUrl')) ? redirect($url) : redirect()->back();
        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $inserat = Inserat::findOrFail($id);
        $inserat->delete();
        \Session::flash('flash_message', trans('messages.destroy_success'));
        //return redirect()->route('inserate.index');
        return redirect()->back();
    }

    public function calculateTotals(Request $request, $format_id)
    {
        $format = new Format;
        $format->preis = 0;
        foreach ($request->format_id as $f) {
            $for = Format::findOrFail($f);
            $format->preis += $for->preis;
        }
        $format->rabatt = $request->rabatt;
        $format->provision = $request->provision;
        $format->art = $request->art;
        if ($request->preisaddinput > 0) {
            $format->preis += $request->preisaddinput;
        }
        if ($request->preisinput > 0) {
            $format->preisinput = $request->preisinput;
        }
        if ($request->nettoinput > 0) {
            $format->nettoinput = $request->nettoinput;
        }
        if ($request->bruttoinput > 0) {
            $format->bruttoinput = $request->bruttoinput;
        }
        $format->add_vat = $request->add_vat;
        $format->totals = $format->calculateCosts();
        return $format;
    }
}
