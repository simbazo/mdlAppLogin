<?php

namespace App\Models\Applications;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;
    
    protected  $primaryKey = 'uuid';    
    protected $dates = ['deleted_at'];
    
    protected  $fillable = ['short_name', 'long_name', 'user_created', 'user_updated', 'user_deleted'];

    public function application()
    {
		return $this->belongsTo('App\Models\Applications\Application');    	
    }

    public function releases()
    {
        return $this->hasMany('App\Models\Applications\Release');
    }
}