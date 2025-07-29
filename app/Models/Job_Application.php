<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_Application extends Model
{
    protected $fillable = ['career_id', 'candidate_id', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'linkedin', 'github', 'behance'];
    protected $table = 'job_applications';
    protected $timestamps = true;

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }

}
