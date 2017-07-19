<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserStatus;
use App\Models\Device;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',   
            'dob' => 'required|date',    
            'sex' => 'required|integer',
            'secret_question' => 'required|string|max:255',
            'secret_answer' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, array $status)
    {
        return 
            User::create([
                'username' => $data['first_name'].$data['last_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'dob' => $data['dob'],
                'sex_uuid' => $data['sex'],
                'status_uuid' => $user['uuid'],
                'secret_question' => $data['secret_question'],
                'secret_answer' => bcrypt($data['secret_answer']),
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password']),
            ]);
    }

    /**
     * Create a new device instance for the user after a valid registration.
     *
     * @param  array  $data
     * @return Device
     */
    protected function createDevice(array $data, User $user)
    {
        return
            Device::create([
                'manufacturer' => $data['manufacturer'],
                'model' => $data['model'],
                'platform' => $data['platform'],
                'version' => $data['version'],
                'serial' => $data['serial'],
                'user_created' => '7'//$user->get('uuid')
            ]);
    }

    /**
     * Attach the device to the registered user.
     *
     * @param  array  $data
     * @return Device
     */
    protected function attachDevice(User $user, Device $device)
    {
        $user->devices()->attach($device->uuid);
    }
}
