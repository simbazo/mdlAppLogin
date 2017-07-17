<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends BaseModel
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['status', 'active', 'user_created', 'user_updated', 'user_deleted'];

    //public function users()
    //{
        //return $this->hasMany('App\Models\User');
    //} 
}