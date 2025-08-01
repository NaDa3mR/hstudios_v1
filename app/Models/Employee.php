<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['name', 'email', 'phone', 'job', 'linkedin', 'github', 'behance', 'salary'];
    protected $table = 'employees';
    public $timestamps = true;
}
