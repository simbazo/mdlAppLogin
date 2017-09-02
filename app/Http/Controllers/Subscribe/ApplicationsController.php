<?php

namespace App\Http\Controllers\Subscribe;

use Session;
use Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptions\Application;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Application index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'Application create';
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
        echo 'Application store<br/>';
        dd(Route::current());
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
     * Show the Licence for the Application.
     *
     *@return View
     */
    public function licence($id = null)
    {
        if ($id == null && session()->has('clientData')) {
            $id = session('clientData')['applicationToken'];
        }
        
        $application = Application::with('licence')->findOrFail($id);

        return view('subscribe.application.licence', compact('application'));
    }

    /**
     * Attach the authenticated User to the Application.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachUser($id)
    {
        $application = Application::findOrFail($id);
        $application->users()->attach(auth()->user()->uuid);
        
        return 'User successfully attached to application';
    }

    /**
     * Detach the authenticated User from the Application.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachUser($id)
    {
        $application = Application::findOrFail($id);
        $application->users()->detach(auth()->user()->uuid);
        
        return 'User successfully detached from application';
    }
}
