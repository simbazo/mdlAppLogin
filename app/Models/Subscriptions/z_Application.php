<?php

namespace App\Models\Subscriptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class z_Application extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['short_name', 'long_name', 'user_created', 'user_updated', 'user_deleted'];

    // Many-to-many relationship with Users
    public function users() {
        return $this->belongsToMany('App\Models\User', 'application_user', 'application_uuid', 'user_uuid');
    }

    // One-to-many relationship with Publications
    public function publications()
    {
        return $this->hasMany('App\Models\Applications\Publication');
    } 

    // One-to-one relationsship with Licences
    public function licence()
    {
        return $this->belongsTo('App\Models\Subscriptions\Licence');
    }
}