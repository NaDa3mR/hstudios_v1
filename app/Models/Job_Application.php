<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Job_Application extends Model implements HasMedia
{
    use InteractsWithMedia;

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
