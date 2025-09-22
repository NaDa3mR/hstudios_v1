<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'deal_id',
        'invoice_number',
        'amount',
        'invoice_date',
        'status',
        'details',
    ];
    protected $casts = [
        'invoice_date' => 'date',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
