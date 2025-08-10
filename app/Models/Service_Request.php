<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_Request extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'client_id', 'details'];
    protected $table = 'service_requests';
    public $timestamps = true;

    public function deal()
    {
        return $this->hasOne(Deal::class, 'service_request_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_request_service', 'service_request_id', 'service_id');
    }


}
