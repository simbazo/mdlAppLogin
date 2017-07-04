<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name', 'last_name', 'email', 'mobile', 'password',
        'secret_question', 'secret_answer', 'description', 'avatar',
        'sex', 'dob', 'user_created','user_updated','user_deleted'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}


/*namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract 
{

    use Authenticatable, CanResetPassword, Notifiable, SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'username','first_name', 'last_name', 'email', 'mobile', 'password',
        'secret_question', 'secret_answer', 'description', 'avatar',
        'sex', 'dob', 'user_created','user_updated','user_deleted'
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];
}*/
