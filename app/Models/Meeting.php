<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['client_id', 'subject', 'type', 'address', 'meet_date', 'details'];
    protected $table = 'meetings';
    protected $timestamps = true;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
