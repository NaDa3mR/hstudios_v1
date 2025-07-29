<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model  
{
    protected $fillable=['first_name', 'last_name', 'email', 'phone', 'country', 'city', 'linkedin', 'github', 'behance', 'is_hired'];
    protected $table = 'candidates';
    public $timestamps = true;
}
