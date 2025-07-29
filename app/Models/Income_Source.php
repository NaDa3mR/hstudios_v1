<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income_Source extends Model
{
    protected $fillable=['name', 'details', 'is_active'];
    protected $table = 'income_sources';
    public $timestamps = true;
}
