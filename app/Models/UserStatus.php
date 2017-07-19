<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use SoftDeletes;

    protected $table = 'user_statuses';
    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    /**
     * The user attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'active', 'user_created', 'user_updated', 'user_deleted'
    ];  

    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'uuid', 'status_uuid');
    }       
}