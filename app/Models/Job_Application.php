<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job_Application extends Model
{
    use SoftDeletes;
    protected $fillable = ['career_id', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'linkedin', 'github', 'behance'];
    protected $table = 'job_applications';

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}
