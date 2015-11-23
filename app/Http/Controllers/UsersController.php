<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        //$user = new User;
        $input = $request->all();
        //dd($input);
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        \Session::flash('flash_message', trans('messages.create_success'));
        //return redirect()->route('clients.edit', [$client->id]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        //$client = Issue::with('inserate')->find($id);
        $inserate = $user->inserate;
        return view('users.show', compact('user','inserate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
            'name' => 'required',
            'last_name' => 'required',
            'password_confirm' => 'same:password'
        ]);

        $user = User::findOrFail($id);
        if ($request->password == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
        }
        
        $user->fill($input)->save();

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
        $user = User::findOrFail($id);
        $user->delete();
        \Session::flash('flash_message', trans('messages.destroy_success'));
        return redirect()->route('inserate.index');
    }
}
