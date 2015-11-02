<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Client::orderBy('firma', 'ASC')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $client = new Client;
        $client->vat_country = 0;
        return view('clients.create', compact('client'));
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
            'firma' => 'required'
        ]);
        $input = $request->all();
        $client = Client::create($input);
        \Session::flash('flash_message', trans('messages.create_success'));
        //return redirect()->route('clients.edit', [$client->id]);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
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
        $this->validate($request, [
            'firma' => 'required'
        ]);
        $client = Client::findOrFail($id);
        $input = $request->all();
        $client->fill($input)->save();

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
        $client = Client::findOrFail($id);
        $client->delete();
        \Session::flash('flash_message', trans('messages.destroy_success'));
        return redirect()->route('clients.index');
    }

    public function showDetails($id)
    {
        $client = Client::findOrFail($id);
        //return $client;
        return view('clients.partials.details', compact('client'));
    }
}
