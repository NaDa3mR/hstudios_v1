<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['title', 'amount', 'transfer_date', 'details'];
    protected $table = 'transfers';
    protected $timestamps = true;

    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'account_id_from');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'account_id_to');
    }

}
