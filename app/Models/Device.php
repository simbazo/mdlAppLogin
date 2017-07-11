<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends BaseModel
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['manufacturer', 'model', 'platform', 'version', 'serial',
                            'user_created', 'user_updated', 'user_deleted'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    } 
}