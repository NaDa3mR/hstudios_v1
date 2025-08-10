<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['client_id', 'deal_id', 'subject', 'type', 'address', 'meet_date', 'details', 'start_time', 'end_time', 'meeting_link', 'notes'];
    protected $table = 'meetings';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }


}
