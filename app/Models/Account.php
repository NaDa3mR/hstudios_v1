<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'balance', 'is_active'];
    protected $table = 'accounts';
    public $timestamps = true;

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function transfersFrom()
    {
        return $this->hasMany(Transfer::class, 'account_id_from');
    }

    public function transfersTo()
    {
        return $this->hasMany(Transfer::class, 'account_id_to');
    }

}
