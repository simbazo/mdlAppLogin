<?php

namespace App\Http\Controllers\Auth;

use App\Models\Subscriptions\Device;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'register.complete';

    /**
     * Create a new Register controller instance that only guests can access.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:55',   
            'dob' => 'required',    
            'sex' => 'required',
            'security_question' => 'required|max:255',
            'security_answer' => 'required|max:255', 
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'emailVerified' => 'required'
        ]);
    }

    /**
     * Create a new user.
     *
     * @param  array  $data
     * @param integer $statusID
     * @return User
     */
    protected function create(array $data, $statusID)
    {
        return 
            User::create([
                'username' => $data['first_name'].$data['last_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'dob' => $data['dob'],
                'sex_uuid' => $data['sex'],
                'status_uuid' => $statusID,
                'security_question' => $data['security_question'],
                'security_answer' => bcrypt($data['security_answer']),
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password']),
            ]);
    }

     /**
     *Update the User status.
     *
     * @param integer $statusID
     * @return User
     */
    protected function updateStatus(User $user, $statusID)
    {
        $data = [
            'status_uuid' => $statusID
        ];

        $user->update($data);

        return $user;
    }

    /**
     * Create a new device instance for the user after a valid registration.
     *
     * @param  array  $data
     * @param integer $userID
     * @return Device
     */
    protected function createDevice(array $data, $userID)
    {
        return
            Device::create([
                'manufacturer' => $data['manufacturer'],
                'model' => $data['model'],
                'platform' => $data['platform'],
                'version' => $data['version'],
                'serial' => $data['serial'],
                'user_created' => $userID
            ]);
    }

    /**
     * Attach the device to the registered user.
     *
     * @param  User  $user
     * @return integer $deviceID
     * @return \Illuminate\Http\Response
     */
    protected function attachDevice(User $user, $deviceID)
    {
        return
            $user->devices()->attach($deviceID);
    }
}
