<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['account_id', 'expense_source_id', 'title', 'amount', 'expense_date', 'details'];
    protected $table = 'expenses';
    public $timestamps = true;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function e_source()
    {
        return $this->belongsTo(Expense_Source::class, 'expense_source_id');
    }
    protected static function booted()
    {
        // static::created(function ($expense) {
        //     $expense->account->decrement('balance', $expense->amount);
        //     if ($expense->account->name === 'cash') {
        //         $expense->e_source->update([
        //             'is_active' => 0
        //         ]);
        //     }
        // });

        static::creating(function ($expense) {
            $account = $expense->account;

            if (!$account) {
                throw new \Exception('Account not found.');
            }

            if ($account->balance < $expense->amount) {
                throw new \Exception('Insufficient account balance to create this expense.');
            }
        });

        static::created(function ($expense) {
            // Safe to decrement now
            $expense->account->decrement('balance', $expense->amount);

            if ($expense->account->name === 'cash' && $expense->e_source) {
                $expense->e_source->update([
                    'is_active' => 0
                ]);
            }
        });
    }
}
