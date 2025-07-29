<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_Request extends Model
{
    protected $fillable=['name', 'client_id', 'service_id', 'status', 'details'];
    protected $table = 'service_requests';
    public $timestamps = true;
    
    public function deal()
    {
        return $this->hasOne(Deal::class);
    }

}
