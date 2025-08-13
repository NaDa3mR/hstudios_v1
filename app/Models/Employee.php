<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Employee extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable=['name', 'email', 'phone', 'job', 'linkedin', 'github', 'behance', 'salary'];
    protected $table = 'employees';
    public $timestamps = true;
}
