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

    /**
     * Get the sex associated with the user
    */
    public function sex(){
        return $this->belongsTo(\App\Models\Sex::class, 'sex_uuid', 'uuid');
    }

     public function status(){
        return $this->belongsTo(\App\Models\UserStatus::class, 'status_uuid', 'uuid');
    }

    public function devices()
    {
        return $this->belongsToMany('App\Models\Device');
    }           
}