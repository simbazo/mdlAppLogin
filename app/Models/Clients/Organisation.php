<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['short_name', 'long_name',
                           'user_created','user_updated','user_deleted'];

    /**
     * Get the Clients that own this Organisation
       This is a many-to-many relationship
    */
    public function clients()
    {
        return $this->belongsToMany(\App\Models\Clients\Client::class, 'client_organisation', 'organisation_uuid', 'client_uuid');
    }

    /**
     * Get the Applications that this Organisation owns
       This is a one-to-many relationship
    */
    public function applications()
    {
        return $this->hasMany(\App\Models\Applications\Application::class, 'organisation_uuid', 'uuid');
    }
    
}