<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['service_request_id', 'status', 'details'];
    protected $table = 'deals';
    public $timestamps = true;

    public function ServiceRequest()
    {
        return $this->belongsTo(Service_Request::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
