<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = ['career_id', 'candidate_id', 'type', 'interview_date', 'duration', 'details'];
    protected $table = 'interviews';

        public function jobApplication()
{
    return $this->belongsTo(Job_Application::class);
}
    public function candidate()
{
    return $this->belongsTo(Candidate::class);
}
    public function career()
{
    return $this->belongsTo(Career::class);
}

}
