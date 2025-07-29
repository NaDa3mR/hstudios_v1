<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['deal_id', 'client_id', 'amount', 'pay_date', 'details'];
    protected $table = 'payments';
    protected $timestamps = true;

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }





}
