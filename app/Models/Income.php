<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['account_id', 'income_source_id', 'title', 'amount', 'income_date', 'details'];
    protected $table = 'incomes';
    public $timestamps = true;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function in_source()
    {
        return $this->belongsTo(Income_Source::class, 'income_source_id');
    }
    protected static function booted()
    {
        static::created(function ($income) {
            $income->account->increment('balance', $income->amount);
            if ($income->account->name === 'income_cash') {
                $income->source->update([
                    'is_active' => 0
                ]);
            }
        });
    }

}
