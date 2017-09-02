<?php

namespace App\Models\Applications;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['short_name', 'long_name', 'user_created', 'user_updated', 'user_deleted'];

    /**
     * Get the Organisation that owns this Application
       This is a many-to-many relationship
    */
    public function organisation()
    {
        return $this->belongsTo(\App\Models\Clients\Organisation::class, 'organisation_uuid', 'uuid');
    }

    // Many-to-many relationship with Users
    public function users() {
        return $this->belongsToMany('App\Models\User', 'application_user', 'application_uuid', 'user_uuid');
    }

    /**
     * Get the Publications that are owned by this Application
       This is a many-to-many relationship because different Applications 
       may bundle the same Publication
    */
    public function publications()
    {
        return $this->belongsToMany(\App\Models\Applications\Publication::class, 'application_publication', 'application_uuid', 'publication_uuid');
    } 

    // One-to-one relationship with Licences
    public function licence()
    {
        return $this->belongsTo('App\Models\Subscriptions\Licence');
    }
}