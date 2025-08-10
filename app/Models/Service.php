<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'title', 'slug', 'meta_keyword', 'meta_description', 'meta_title', 'details'];
    protected $table = 'services';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function deals()
    {
        return $this->belongsToMany(Deal::class, 'deal_service');
    }

    public function serviceRequests()
    {
        return $this->belongsToMany(Service_Request::class, 'service_request_service','service_id' , 'service_request_id');
    }

}

