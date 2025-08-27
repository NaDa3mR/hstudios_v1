<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    protected $fillable = ['service_request_id', 'client_id', 'name', 'service_id', 'status', 'details'];
    protected $table = 'deals';
    public $timestamps = true;

    public function ServiceRequest()
    {
        return $this->belongsTo(Service_Request::class, 'service_request_id')->withTrashed();
        ;
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'deal_service', 'deal_id', 'service_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
