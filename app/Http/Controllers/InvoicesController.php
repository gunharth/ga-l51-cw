<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Issue;
use App\Inserat;
use PDF;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('inserat')->get();
        //$invoices$invoices->inserate;
        //dd($invoices);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createInvoices(Request $request)
    {
        $inserate = Inserat::where('faktura',1)->where('issue_id', $request->id)->get();
        //dd($inserate);
        foreach($inserate as $inserat) {
            //var_dump($inserat->id);
            $invoice = new Invoice();
            $invoice->inserat_id = $inserat->id;
            $invoice->save();
            //$this->store($inserat->id);
        }
        $issue = Issue::find($request->id);
        $issue->faktura = 1;
        $issue->save();
        
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   public function printInvoices($id)
    {
        $inserate = Inserat::where('faktura',1)->where('issue_id', $id)->with('invoice')->with('client')->get();
        //dd($inserate);
        //Invoice::with('inserat')->get();
        $invoice_file = 'Rechnungen.pdf';
        $pdf = PDF::loadView('pdf.invoices', compact('inserate'));
        return $pdf->download($invoice_file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
