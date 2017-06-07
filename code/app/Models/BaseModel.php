<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
 */
class BaseModel extends Model{

	public $incrementing = false;

	public static function boot() {
		parent::boot();
		static::creating(function($model) {
            // Only generate the uuid if the field actually is called uuid.
            // For some system models a normal id is used (e.g. language)
			if($model->getKeyName() == 'uuid'){
				$model->{$model->getKeyName()} = (string)$model->generateNewId();
			}
		});

		static::addGlobalScope('order', function (Builder $builder) {
			$builder->orderBy('created_at', 'desc');
		});
	}

    /**
     * Get a new version 4 (random) UUID.
     * @return Uuid
     */
    public function generateNewId()
    {
    	return Uuid::generate(4);
    	#return Uuid::generate(5,'mdl', Uuid::NS_DNS);
    }

    /**
     * Override save function to catch mySQL error in case of double id's
     * @param array $options
     * @return bool|void
     */
    public function save (array $options = array())
    {
    	try{
    		parent::save($options);
    	}catch(Exception $e){
            // check if the exception is caused by double id
    		if(preg_match('/Integrity constraint violation: 1062 Duplicate entry \S+ for key \'PRIMARY\'/', $e->getMessage(), $matches)){
    			$this->{$this->getKeyName()} = (string)$this->generateNewId();
    			$this->save();
    		}
    	}
    }
}
