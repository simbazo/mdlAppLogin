<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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
    protected $redirectTo = null;//'/auth/confirm/'.user->first_name.' '.user->last_name.'/'.user->email;

    /**
     * Create a new controller instance.
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
            'dob' => 'required',    
            'sex' => 'required',
            'secret_question' => 'required',
            'secret_answer' => 'required', 
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
    protected function create(array $data)
    {
        return 
            User::create([
                'username' => $data['first_name'].$data['last_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'dob' => $data['dob'],
                'sex' => $data['sex'],
                'secret_question' => $data['secret_question'],
                'secret_answer' => $data['secret_answer'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password']),
            ]);
    }

    protected function createDevice(array $data, User $user)
    {
        return
            Device::create([
                'manufacturer' => $data['manufacturer'],
                'model' => $data['model'],
                'platform' => $data['platform'],
                'version' => $data['version'],
                'serial' => $data['serial'],
                'user_created' => $user->uuid
            ]);
    }

    protected function attachDevice(User $user, Device $device)
    {
        $user->devices()->attach($device->uuid);
    }
}
