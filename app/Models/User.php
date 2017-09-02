<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    /**
     * The user attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'dob', 'sex_uuid', 'status_uuid', 'email', 
        'mobile', 'password', 'security_question', 'security_answer', 'description', 'avatar', 
        'user_created','user_updated','user_deleted'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sex(){
        return $this->belongsTo(\App\Models\Sex::class, 'sex_uuid', 'uuid');
    }

    /**
        * The status of the user
    **/
    public function status(){
        return $this->belongsTo(\App\Models\UserStatus::class, 'status_uuid', 'uuid');
    }

    /**
        * The applications that belong to the user
    **/
    public function applications() {
        return $this->belongsToMany('App\Models\Applications\Application', 'application_user', 'user_uuid', 'application_uuid');
    }

    public function devices() {
        return $this->belongsToMany('App\Models\Subscriptions\Device', 'device_user', 'user_uuid', 'device_uuid');
    }

    public function attachDevice($deviceID)
    {
       $this->devices()->attach($deviceID);
    }
}