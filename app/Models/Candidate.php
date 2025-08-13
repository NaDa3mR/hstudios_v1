<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Candidate extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'career_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'city',
        'linkedin',
        'github',
        'behance',
        'is_hired'
    ];
    protected $table = 'candidates';

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function jobApplication()
    {
        return $this->belongsTo(Job_Application::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }

}
