<?php

namespace App\Http\Controllers\Subscribe;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptions\Licence;
use App\Models\Applications\Application;

class LicencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$licences = Licence::all();

        //return view('subscribe.licence.index', compact('licences'));
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

    public function application($id = null)
    {
        if ($id == null && session()->has('clientData')) {
            $id = session('clientData')['applicationToken'];
        }

        $application = Application::with('licence')->findOrFail($id);
        
        return view('subscribe.licence.application', compact('application'));
    }

    public function subscribe(Request $request)
    {
        if (session()->has('clientData')) {
            switch ($request->get('licenceUuid')) {
                case 1:
                    return redirect()->route('subscriptions.free.show', ['id' => session('clientData')['applicationToken']]);
                    break;
                case 2:
                    return redirect()->route('subscriptions.organisation.show', session('clientData')['applicationToken']);
                    break;
                case 3:
                    return redirect()->route('subscriptions.purchase.show', ['id' => session('clientData')['applicationToken']]);
                    break;
                default:
                    return 'Error: Unknown licence type';
                    break;
            }
        } else {
            return 'Error: No client data in the session';
        }
    }
}
