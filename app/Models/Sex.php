<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sex extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['sex','user_created','user_updated','user_deleted'];

    /**
     * Get the users that have this sex
    */
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'uuid', 'sex_uuid');
    }
    
}
