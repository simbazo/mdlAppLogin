<?php

namespace App\Models\Subscriptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['application_uuid', 'user_uuid', 'status_uuid', 
                            'user_created', 'user_updated', 'user_deleted'];

    /**
     * Get the Organisation that owns this Application
       This is a many-to-many relationship
    */
    public function organisation()
    {
        return $this->belongsTo(\App\Models\Clients\Organisation::class, 'organisation_uuid', 'uuid');
    }

    /**
     * Get the Devices that have been attached to the Subscription.
       This is a many-to-many relationship because Subscriptions 
       may contain multiple Devices and Devices may be registered 
       for multiple Subscriptions.
    */
    public function devices() {
        return $this->belongsToMany('App\Models\Subscriptions\Device', 'device_subscription', 'subscription_uuid', 'device_uuid')->withPivot('active');
    }

    public function application() {
        return $this->belongsTo('App\Models\Subscriptions\Application', 'application_uuid', 'uuid');
    }

    /**
     * Get the Users that are subscribed to the Application
       This is a many-to-many relationship
    */
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

    /**
     * Get the Licence bound to this Subscription
       This is a one-to-one relationship because an Application 
       may have only one licence
    */
    public function licence()
    {
        return $this->belongsTo('App\Models\Subscriptions\Licence');
    }

    
}