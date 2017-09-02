<?php

namespace App\Models\Subscriptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['name', 'manufacturer', 'model', 'platform', 'version', 'serial',
                            'user_created', 'user_updated', 'user_deleted'];

    public function subscriptions()
    {
        return $this->belongsToMany(\App\Models\Subscriptions\Subscription::class, 'device_subscription', 'device_uuid', 'subscription_uuid')->withPivot('active');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User', 'device_user', 'device_uuid', 'user_uuid');
    }
    

    public function clients()
    {
        return $this->belongsToMany(\App\Models\Clients\Client::class, 'client_organisation', 'organisation_uuid', 'client_uuid');
    }
}