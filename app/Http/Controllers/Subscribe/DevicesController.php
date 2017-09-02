<?php

namespace App\Http\Controllers\Subscribe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptions\Device;
use App\Models\Subscriptions\Subscription;
use App\Models\Subscriptions\Application;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->intended('subscribe/devices/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get a collection of Devices with this serial number
        $devices = Device::with('subscriptions')->where('serial', session('clientData')["serial"])->get();

        // Check if the Device is already stored
        if ($devices->count() == 0) {
            // Capture this Device because it's serial number is unique
            return view('subscribe.device.create');
        } else {
            // Check if the Device is attached to this Subscription
            $subscription = Subscription::with('devices')
                                        ->where('application_uuid', session('clientData')['applicationToken'])
                                        ->where('user_uuid', auth()->user()->uuid)
                                        ->get();

            if (!$subscription->devices->contains('serial', $devices->first()->serial)) {
                $devices->first()->subscriptions()->attach($subscription->uuid);
            }

            // Get maximum devices allowed for this Application
            $maxDevices = $application = Application::FindOrFail(session('clientData')['applicationToken'])->max_devices;

            //Check if this Subscriptions has more Devices attached than allowed
            if ($subscription->devices->count() > $maxDevices) {
                // Redirect to subscription devices list
                return redirect()->route('subscription.devices', $subscription->uuid);
            } else {
                // Redirect to subscription.complete screen
                return redirect()->route('subscription.complete');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get devices with this serial number
        $devices = Device::where('serial', $request->get('serial'))->get();

        //Only create the device if it does not exist
        if ($devices->count() == 0) {
                $device = Device::create([
                'name'              => $request->get('name'),
                'manufacturer'      => $request->get('manufacturer'),
                'model'             => $request->get('model'),
                'platform'          => $request->get('platform'),
                'version'           => $request->get('version'),
                'serial'            => $request->get('serial'),
                'user_created'      => auth()->user()->uuid,
                'user_updated'      => auth()->user()->uuid
            ]);
        } else {
            $device = $devices->first();
        }

        // Get this Subscription
        $subscription = Subscription::with('devices')
                                    ->where('application_uuid', session('clientData')['applicationToken'])
                                    ->where('user_uuid', auth()->user()->uuid)
                                    ->first();

        // Attach the Subscription to the Device if its not already attached
        if ($subscription->devices->count() == 0) {
            $subscription->devices()->attach($device->uuid);
        }        

        return redirect()->route('device.list', session('clientData')['applicationToken']);
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
     * List all Devices with the serial number.
     *
     * @param  int  $id (applicationID)
     * @return \Illuminate\Http\Response
     */
    public function list($id = null)
    {
        if ($id == null && session()->has('clientData')) {
            $id = session('clientData')['applicationToken'];
        }

        // Get a collection of Devices with this serial number
        $devices = Device::with('subscriptions')->where('serial', session('clientData')['serial'])->get();

        // Capture this device if it is new
        if ($devices->count() == 0) {
            return view('subscribe.device.create');
        }
        // Get the Subscription for this User
        $subscriptions = Subscription::with('devices')
                                     ->where('application_uuid', $id)
                                     ->where('user_uuid', auth()->user()->uuid)
                                     ->get();

        if ($subscriptions->count() == 0) {
            return 'No Subscription exists yet - redirect back to the Create Subscription route';
        } else {
            if (!$subscriptions->first()->devices->contains('serial', $devices->first()->serial)) {
                $devices->first()->subscriptions()->attach($subscriptions->first()->uuid);
            }

            // Get maximum devices allowed for this Application
            $maxDevices = Application::FindOrFail($id)->max_devices;

            //Check if this Subscriptions has more Devices attached than allowed
            if ($subscriptions->first()->devices->count() > $maxDevices) {
                // Redirect to subscription devices list
                return redirect()->route('subscription.devices', $subscriptions->first()->uuid);
            } else {
                // Redirect to subscription.complete screen
                return redirect()->route('subscription.complete', $subscriptions->first()->uuid);
            }
        }
    }

    /**
     * List Subscriptions attched to a Device.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function subscriptions($id = null)
    {
        if ($id == null) {
            $id = Device::where('serial', session('clientData')['serial'])->get();
        }
        $device = Device::FindOrFail($id);
        $subscription = Subscription::where('application_uuid', session('clientData')['applicationToken'])
                                    ->where('user_uuid', auth()->user()->uuid)
                                    ->first()
                                    ->get();

        $device->subscriptions()->attach($subscription->uuid);

        return redirect()->intended('subscribe/devices');
    }

    /**
     * Attach a Subscription to a Device.
     * 
     * @param  Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachSubscription(Request $request, $id)
    {
        $device = Device::FindOrFail($id);
        $subscription = Subscription::where('application_uuid', session('clientData')['applicationToken'])
                                    ->where('user_uuid', auth()->user()->uuid)
                                    ->first()
                                    ->get();

        $device->subscriptions()->attach($subscription->uuid);

        return redirect()->intended('subscribe/devices');
    }

    /**
     * Detach a a Subscription from a Device.
     * 
     * @param  Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachSubscription(Request $request, $id)
    {
        $device = Device::FindOrFail($id);
        $subscription = Subscription::where('application_uuid', session('clientData')['applicationToken'])
                                    ->where('user_uuid', auth()->user()->uuid)
                                    ->first()
                                    ->get();

        $device->subscriptions()->detach($subscription->uuid);

        return redirect()->intended('subscribe/devices');
    }    

    /**
     * Attach the authenticated User to the Device.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function attachUser($id)
    {
        $device = Device::findOrFail($id);
        $device->users()->attach(auth()->user()->uuid);

        return redirect()->intended('subscribe/devices/index');
    }

    /**
     * Detach the authenticated User from the Device.
     * 
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function detachUser($id)
    {
        $device = Device::findOrFail($id);
        $device->users()->detach(auth()->user()->uuid);

        return redirect()->intended('subscribe/devices/index');
    }
}
