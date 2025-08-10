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
        // static::created(function ($income) {
        //     $income->account->increment('balance', $income->amount);
        //     if ($income->account->name === 'income_cash') {
        //         $income->source->update([
        //             'is_active' => 0
        //         ]);
        //     }
        // });

        static::creating(function ($income) {
            $account = $income->account;

            if (!$account) {
                throw new \Exception('Account not found.');
            }

            if ($account->balance < $income->amount) {
                throw new \Exception('Insufficient account balance to create this income.');
            }
        });

        static::created(function ($income) {
            // Safe to decrement now
            $income->account->decrement('balance', $income->amount);

            if ($income->account->name === 'cash' && $income->e_source) {
                $income->e_source->update([
                    'is_active' => 0
                ]);
            }
        });
    }

}
