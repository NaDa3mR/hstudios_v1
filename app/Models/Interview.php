<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = ['job_application_id', 'type', 'interview_date', 'duration', 'details'];
    protected $table = 'interviews';
    protected $timestamps = true;

    public function jobApplication()
{
    return $this->belongsTo(Job_Application::class);
}

}
