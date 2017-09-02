<?php

namespace App\Http\Controllers\Subscribe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Organisation;
use App\Models\Subscriptions\Application;
use App\Models\Subscriptions\Invitation;
use App\Models\Subscriptions\Subscription;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new Subscription.
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
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function storeFree()
    {
        $this->createSubscription();

        return redirect()->route('device.list', session('clientData')['applicationToken']);
    }

    /**
     * Store a newly created Organisation subscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrganisation(Request $request)
    {
        if ($this->consumeInvitation($request)) {
            $this->createSubscription();

            return redirect()->route('device.list', session('clientData')['applicationToken']);
        } else {
            return redirect()->route('subscriptions.organisation.error', session('clientData')['applicationToken'])->with('organisation_uuid', $request->organisation_uuid)->with('staff_number', $request->staff_number);
        }  
    }

    /**
     * Store a newly createPurchase subscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePurchase(Request $request)
    {
        $message;
        $proceed;

        if ($this->confirmPurchase($request->purchase_number)) {
            $this->createSubscription();

            return redirect()->route('device.list', session('clientData')['applicationToken']);
        } else {
            return redirect()->route('subscriptions.purchase.error', session('clientData')['applicationToken'])->with('organisation_uuid', $request->organisation_uuid);
        }
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
     * Display the Free subscription. 
     * Redirect to Free store route. 
     *
     * @return \Illuminate\Http\Response
     */
    public function showFree($id = null)
    {
        if (session()->has('clientData')) {
            return redirect()->route('subscriptions.free.store', ['id' => session('clientData')['applicationToken']]);
        } else {
            return 'Error: No client data in the session';
        }
    }

    /**
     * Show the Organisation subscription screen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrganisation($id = null) 
    {
        if (session()->has('clientData')) {
            $organisations = Organisation::all();
            return view('subscribe.subscription.organisation', compact('organisations'));
        } else {
            return 'Error: No client data in the session';
        }
    }

    /**
     * Show the Organisation subscription error screen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrganisationError($id = null) 
    {
        if (session()->has('clientData')) {
            $organisations = Organisation::all();

            $invitations = Invitation::where('organisation_uuid', session('organisation_uuid'))
                                      ->where('application_uuid', session('clientData')['applicationToken'])
                                      ->where('email', session('clientData')['email'])
                                      ->get();

             if ($invitations->count() == 0) {
                $message = 'You do not have an organisational invitation to use this application. Please contact your organisation\'s support staff to create your invitation and try subscribing again.';
                $proceed = 0;
             } else {
                $invitations = Invitation::where('organisation_uuid', session('organisation_uuid'))
                                         ->where('application_uuid', session('clientData')['applicationToken'])
                                         ->where('email', session('clientData')['email'])
                                         ->where('active', 1)                                   
                                         ->get();

                 if ($invitations->count() == 0) {
                        $message = 'You do not have an Active organisational invitation to use this application. Please contact your organisation\'s support staff to reset your invitation and try subscribing again.';
                        $proceed = 0;
                } else {
                    $invitations = Invitation::where('organisation_uuid', session('organisation_uuid'))
                                              ->where('application_uuid', session('clientData')['applicationToken'])
                                              ->where('email', session('clientData')['email'])
                                              ->where('active', 1)
                                              ->where('staff_number', session('staff_number'))                         
                                              ->get();

                    if ($invitations->count() == 0) {
                        $message = 'The staff number you entered appears to be invalid. Please try again.';
                        $proceed = 1;
                    }
                }
            }

            return view('subscribe.subscription.organisationerror', compact('organisations', 'message', 'proceed'));
        } else {
            return 'Error: No client data in the session';
        }
    }

    /**
     * Show the Purchase subscription screen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPurchase($id = null) 
    {
        if (session()->has('clientData')) {
            return view('subscribe.subscription.purchase');
        } else {
            return 'Error: No client data in the session';
        }
    }

    /**
     * Show the Purchase subscription error screen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPurchaseError($id = null) 
    {
        if (session()->has('clientData')) {
            $organisations = Organisation::all();
            $message = 'The App Store or Purchase number is incorrect. Please try again.';

            return view('subscribe.subscription.purchaseerror', compact('organisations', 'message'));
        } else {
            return 'Error: No client data in the session';
        }
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
     * Redirects to new or existing Subscription
     *
     * @param  int  $applicationID
     * @return \Illuminate\Http\Response
     */
    public function redirect($applicationID = null)
    {
        //Retrive applicationID from session if it is null
        if ($applicationID == null && session()->has('clientData')) {
            $applicationID = session('clientData')['applicationToken'];
        }

        //Retrieve and Subscriptions for this User and Application
        $subscriptions = Subscription::where('application_uuid', $applicationID)
                                    ->where('user_uuid', auth()->user()->uuid)
                                    ->get();

        if ($subscriptions->count() == 0) {
            return redirect()->route('application.licence', $applicationID);
        } else {
            return redirect()->route('device.list', $applicationID);
        }
    }

    /**
     * Show the confirmation of the Subscription.
     *
     * @param  int  $id - subscriptionID
     * @return \Illuminate\Http\Response
     */
    public function complete($id = null)
    {
        // If there is no Subscription ID then fetch Subscription using applicationID and userID
        if ($id == null && session()->has('clientData')) {
            $subscription = Subscription::with('devices')                                
                                        ->where('application_uuid', session('clientData')['applicationToken'])
                                        ->where('user_uuid', auth()->user()->uuid)
                                        ->first();
        } else {
            $subscription = Subscription::with('devices')
                                        ->where('uuid', $id)
                                        ->first();
        }

        $application = Application::with('licence')
                                  ->FindOrFail($subscription->application_uuid);

        return view('subscribe.subscription.complete', compact('subscription', 'application'));
    }

    protected function consumeInvitation(Request $request) {
        $invitations = Invitation::where('organisation_uuid', $request->get('organisation_uuid'))
                                 ->where('application_uuid', session('clientData')['applicationToken'])
                                 ->where('email', session('clientData')['email'])
                                 ->where('staff_number', $request->get('staff_number')) 
                                 ->where('active', 1)                                   
                                 ->get();


        if ($invitations->count() == 0) {
            return false;
        }

        $data = [
            'active'            => 0,
            'user_updated'      => auth()->user()->uuid
        ];

        try {
            foreach($invitations as $invitation) {
                $invitation->update($data);
            }
        }
        catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Confirm the purchase number for the Application.
     * 
     * @param  string  $purchaseNumber
     * @return \Illuminate\Http\Response
     */
    protected function confirmPurchase($purchaseNumber) {
        if ($purchaseNumber == "12345") {
            return true;
        }

        return false;
    }

    /**
     * List Devices attached to a Subscription.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function devices($id = null)
    {
        if ($id == null) {
            $subscription = Subscription::with('devices', 'application')                                
                                        ->where('application_uuid', session('clientData')['applicationToken'])
                                        ->where('user_uuid', auth()->user()->uuid)
                                        ->first();
        } else {
            $subscription = Subscription::FindOrFail($id);
        }

        $devices = $subscription->devices;
        $application = $subscription->application;

        return view('subscribe.subscription.devices', compact('devices', 'application'));
    }

    /**
     * Attach a Device to a Subscription.
     * 
     * @param  Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachDevice(Request $request, $id)
    {
        $subscription = Subscription::FindOrFail($id);
        $device = Device::findOrFail($request->get('device_uuid'));

        $subscription->devices()->attach($device->uuid);

        return redirect()->intended('subscribe/devices/');
    }

    /**
     * Detach a Device from a Subscription.
     * 
     * @param  Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachDevice(Request $request, $id)
    {
        $subscription = Subscription::FindOrFail($id);
        $device = Device::findOrFail($request->get('device_uuid'));

        $subscription->devices()->detach($device->uuid);
        
        return redirect()->intended('subscribe/devices');
    }

    protected function createSubscription()
    {
        // First check if the Subscription already exists
        $subscriptions = Subscription::where('application_uuid', session('clientData')['applicationToken'])
                                     ->where('user_uuid', auth()->user()->uuid)
                                     ->get();

        if ($subscriptions->count() == 0) {
            $data = [
                'application_uuid'  => session('clientData')['applicationToken'],
                'user_uuid'         => auth()->user()->uuid,
                'status_uuid'       => 1,
                'user_created'      => auth()->user()->uuid,
                'user_updated'      => auth()->user()->uuid
            ];

            $subscription = Subscription::create($data);
        }
    }
}
