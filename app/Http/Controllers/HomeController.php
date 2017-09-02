<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserStatus;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showRegistrationCompletionForm($id = null)
    {
        if ($id == null) {
            $id = auth()->user()->uuid;
        }

        $user = User::with('status')->FindOrFail($id);        

        return view('auth.complete', compact('user'));
    }

    public function confirmRegistration(Request $request)
    {
        if ($request->emailVerified == "true") {
            // Get User and Status models
            $user = User::FindOrFail(auth()->user()->uuid);
            $status = UserStatus::where('status', 'Registration successful')->get()->first();

            // Update and save the user model 
            $user->update([
                'status_uuid' => $status->uuid
            ]);

            // Assign the User model to the authenticated user
            Auth::setUser($user);

            // Redirect to the start of the Subscription process
            return redirect()->route('subscriptions.redirect', session('clientData')['applicationToken']);            
        }

        // Redirect to the login screen
        return redirect()->route('login');
    }
}
