<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'uuid';
    protected $dates = ['deleted_at'];

    protected $fillable = ['short_name', 'long_name', 'email', 'phone', 'fax', 'cell',
                           'country_uuid', 'province', 'city', 'address_line1', 'address_line2',
                           'postal_code', 'contact_person_fname', 'contact_person_lname', 
                           'contact_person_email', 'contact_person_cell', 
                           'user_created','user_updated','user_deleted'];

    /**
     * Get the Organisations that this Client has
       This is a many-to-many relationship
    */
    public function organisations()
    {
        return $this->belongsToMany(\App\Models\Clients\Organisation::class, 'client_organisation', 'client_uuid', 'organisation_uuid');
    }
    
}