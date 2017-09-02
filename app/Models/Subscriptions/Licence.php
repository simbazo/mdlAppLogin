<?php

namespace App\Models\Subscriptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licence extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['type', 'terms', 'upload_schedule', 'download_schedule',
                            'user_created', 'user_updated', 'user_deleted'];

    public function applications()
    {
        return $this->hasMany('App\Models\Applications\Application');
    } 
}