<?php

namespace App\Http\Controllers\Subscribe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptions\Organisation;

class OrganisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Attach a client to the Organisation.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachClient($id)
    {
        //$application = Application::findOrFail($id);
        //$application->users()->attach(auth()->user()->uuid);
        
        //return 'User successfully attached to application';
    }

    /**
     * Detach a Client from the Organisation.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachClient($id)
    {
        //$application = Application::findOrFail($id);
        //$application->users()->detach(auth()->user()->uuid);
        
        //return 'User successfully detached from application';
    }

    /**
     * Attach the authenticated User to the Organisation.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachUser($id)
    {
        //$application = Application::findOrFail($id);
        //$application->users()->attach(auth()->user()->uuid);
        
        //return 'User successfully attached to application';
    }

    /**
     * Detach the authenticated User from the Oragnisation.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachUser($id)
    {
        //$application = Application::findOrFail($id);
        //$application->users()->detach(auth()->user()->uuid);
        
        //return 'User successfully detached from application';
    }
}
