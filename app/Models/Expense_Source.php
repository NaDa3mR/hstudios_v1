<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense_Source extends Model
{
    protected $fillable=['name', 'details', 'is_active'];
    protected $table = 'expense_sources';
    public $timestamps = true;
}
