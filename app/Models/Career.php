<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable=['title', 'currency', 'type', 'experience_level', 'details', 'min_salary', 'max_salary', 'is_active', 'is_published'];
    protected $table = 'careers';
    public $timestamps = true;

}
