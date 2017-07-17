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
        'username', 'first_name', 'last_name', 'dob', 'sex', 'email', 'mobile', 'password',
        'secret_question', 'secret_answer', 'status_uuid', 'description', 'avatar', 
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

    //public function status()
    //{
        //return $this->belongsTo('App\Models\Status');
    //}

    //public function devices()
    //{
        //return $this->belongsToMany('App\Models\Device');
    //}           
}